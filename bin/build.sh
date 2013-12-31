#!/bin/bash

# Handles errors... http://stackoverflow.com/questions/64786/error-handling-in-bash
function error_exit
{
  echo "An error occured: ${1:-"Unknown Error"}" 1>&2
  echo "Exiting script."
  exit 1
}

# Output path for logs and reports
REPORT_PATH=$WORKSPACE_PATH/reports/$BUILD_NUMBER/logs

# Get started
echo "Building $APPLICATION..."

# Clone the repository
echo "Pulling down code changes..."
if [ -f $WORKSPACE_PATH/README.md ]; then
  cd $WORKSPACE_PATH
  git pull origin master
else
  git clone $REPOSITORY_URL $WORKSPACE_PATH
fi
if [ "$?" = "0" ]; then
  echo "Done pulling down changes."
else
  error_exit "Could not pull down changes from the remote repository."
fi

# Pull down dependencies
if [ -f $WORKSPACE_PATH/composer.json ]; then
  echo "Pulling down dependencies..."
  php bin/composer.phar install
  echo "Done pulling down dependencies."
fi

# Analyze code & generate reports
echo "Generating folders for reports..."
cd $WORKSPACE_PATH
mkdir -p $REPORT_PATH -m 0777
echo "Done generating folders for reports."

# Run tests if a configuration file exists, otherwise run php lint
if [ -f $WORKSPACE_PATH/phpunit.xml.dist ]; then
  echo "Running tests..."
  cd tests
  cat $WORKSPACE_PATH/phpunit.xml.dist | sed -e 's/ENV\"\ value=\"test\"/ENV\"\ value=\"build\"/g' > phpunit.xml
  phpunit --log-junit=$REPORT_PATH/junit.xml -dxdebug.coverage_enable=1 --coverage-clover=$REPORT_PATH/clovercoverage.xml
  if [ "$?" = "0" ]; then
    echo "Done running tests. Code coverage report generated."
  else
    error_exit "Errors occurred while running tests."
  fi
else
  echo "Running lint..."
  find -L $WORKSPACE_PATH -name '*.php' -print0 | xargs -0 -n 1 -P 4 php -l > $REPORT_PATH/lint.log
  if [ "$?" = "0" ]; then
    echo "Done running lint on all PHP files. Log file generated."
  else
    error_exit "Errors were found running lint on PHP files."
fi

# Generate mess detection report
echo "Running mess detection..."
phpmd . xml unusedcode,design,codesize --minimumpriority 3 --reportfile $REPORT_PATH/phpmd.xml || true
if [ "$?" = "0" ]; then
  echo "Done running mess detection. Mess detection report generated."
else
  error_exit "Errors or warnings found during mess detection."
fi

# Finish
echo "Build successfully completed!"
exit 0

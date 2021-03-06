#!/bin/bash

# Path for build files
BUILD_PATH=$WORKSPACE_PATH/.ci

# Path for build number
BUILD_NUMBER_PATH=$BUILD_PATH/build.number

# Increment the build number
if [ -f $BUILD_NUMBER_PATH ]; then
  TMP_BUILD_NUMBER=`more $BUILD_NUMBER_PATH`
  BUILD_NUMBER=`expr $TMP_BUILD_NUMBER + 1`
else
  mkdir -m 0775 -p $BUILD_PATH
  touch $BUILD_NUMBER_PATH
  BUILD_NUMBER=1
fi
echo $BUILD_NUMBER > $BUILD_NUMBER_PATH

# Path for logs and reports
REPORT_PATH=$BUILD_PATH/reports/$BUILD_NUMBER

# Log the status of the build
function log_status
{
  BUILD_TIME=`date +"%c"`
  STATUS_PATH=$BUILD_PATH/status.log
  if [ -f $STATUS_PATH ]; then
    touch $STATUS_PATH
  fi
  echo "Build $BUILD_NUMBER of $APPLICATION finished at $BUILD_TIME with the following status: $1." >> $STATUS_PATH
}

# Handles errors... http://stackoverflow.com/questions/64786/error-handling-in-bash
function error_exit
{
  echo "An error occured: ${1:-"Unknown Error"}" 1>&2
  echo "Exiting script."
  log_status "failure"
  exit 1
}

# Get started
echo "Building $APPLICATION..."

# Clone the repository
echo "Pulling down code changes..."
if [ -d $WORKSPACE_PATH/.git ]; then
  cd $WORKSPACE_PATH
  git pull origin master
else
  git clone --recursive $REPOSITORY_URL $WORKSPACE_PATH.tmp && mv $WORKSPACE_PATH.tmp/* $WORKSPACE_PATH.tmp/.git $WORKSPACE_PATH && rm -rf $WORKSPACE_PATH.tmp
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
mkdir -m 0775 -p $REPORT_PATH
echo "Done generating folders for reports."

# Run lint to check for errors                                                                                                                                                                      
echo "Running lint..."
find -L $WORKSPACE_PATH -name '*.php' -print0 | xargs -0 -n 1 -P 4 php -l > $REPORT_PATH/lint.log
if [ "$?" = "0" ]; then
  echo "Done running lint on all PHP files. Log file generated."
else
  error_exit "Errors were found running lint on PHP files."
fi

# Run tests if a configuration file exists
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
fi

# Finish
echo "Build successfully completed!"
log_status "success"
exit 0

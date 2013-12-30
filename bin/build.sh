#!/bin/sh

# Output path for phpunit, jdepend, phpmd logs
REPORT_PATH=$WORKSPACE/reports/$BUILD_NUMBER/logs

# Clone the repository
cd $WORKSPACE
if [ -f $WORKSPACE/README.md ]; then
  git pull
else
  git clone $REPOSITORY_URL
fi
git submodule update --init --recursive

# Pull down dependencies
if [ -f $WORKSPACE/composer.json ]; then
  echo "Pulling down dependencies..."
  php bin/composer.phar install
  echo "Done pulling down dependencies."
fi

# Analyze code & generate reports
echo "Generating folders for reports..."
cd $WORKSPACE
mkdir -p $REPORT_PATH -m 0777;
echo "Done generating folders for reports."

# Run tests if there is a configuration file
if [ -f $WORKSPACE/phpunit.xml.dist ]; then
  echo "Generating test results and code coverage report..."
  cd tests
  cat phpunit.xml.dist | sed -e 's/ENV\"\ value=\"test\"/ENV\"\ value=\"build\"/g' > phpunit.xml
  phpunit --log-junit=$OUTPUT_LOGS_PATH/junit.xml -dxdebug.coverage_enable=1 --coverage-clover=$OUTPUT_LOGS_PATH/clovercoverage.xml
  rm phpunit.xml
  echo "Done running tests and generating code coverage report."
fi

# Generate mess detection report
echo "Running mess detection..."
phpmd ./library xml unusedcode,design,codesize --minimumpriority 2 --reportfile $OUTPUT_LOGS_PATH/phpmd.xml || true
echo "Done running mess detection. Mess detection report generated."

# Finish
echo "Build successfully completed!"

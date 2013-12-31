#!/bin/sh

cd $WORKSPACE_PATH
echo "Preparing to deploy $APPLICATION..."
for server in $DEPLOY_SERVERS; do
  echo "Deploying code to $server..."
  rsync -avr --delete \
    --exclude="*.md" \
    --exclude=".git*" \
    --exclude="tests" \
    $WORKSPACE_PATH/* \
    $DEPLOY_USER@$server:$DEPLOY_PATH
  echo "Done deploying code to $server."
done
echo "Done deploying $APPLICATION."

<?php

namespace GriaCi;
// APPLICATION=WP-Write WORKSPACE_PATH=`pwd`/wp-write REPOSITORY_URL=git@bitbucket.org:guillermoandrae/wp-write.git ~/Sites/gria-ci/bin/build.sh

class Build extends LockableCommand
{

  const COMMAND_PATTERN = 'APPLICATION=%s WORKSPACE=%s REPOSITORY_URL=%s';

  public function init()
  {
    $this->setScriptPath('');
  }

  public function getCommand()
  {
    $config = $this->getConfig();
    $command = sprintf(static::COMMAND_PATTERN, $config->name, $config->workspacePath, $config->repositoryUrl);
    return $command;
  }

}


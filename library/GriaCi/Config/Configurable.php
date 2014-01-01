<?php

namespace GriaCi;

class Configurable
{

  /** @var \Gria\Config **/
  private $_config;

  /**
   * @param \Gria\Config $config
   */
  public function __construct(\Gria\Config $config)
  {
    $this->_config = $config;
  }

  /**
   * @return \Gria\Config
   */
  public function getConfig()
  {
    return $this->_config;
  }

}

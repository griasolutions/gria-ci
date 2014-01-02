<?php

namespace GriaCi\Hook;

class Factory
{
  public static function factory(\GriaCi\Hook\Request $request)
  {
    $type = $request->getType();
    $className = self::_getClassName($type);
    $hook = new $className($request);
    return $hook;
  }

  private static function _getClassName($type)
  {
    return $type;
  }

}

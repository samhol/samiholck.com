<?php

/**
 * ExceptionListener.php (UTF-8)
 * Copyright (c) 2012 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Config\ErrorHandling;

use Throwable;

/**
 * Defines an Exception listener for Error dipatcher
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * $link    http://php.net/manual/en/function.set-exception-handler.php
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface ExceptionListener {

  /**
   * 
   * @param Throwable $e
   */
  public function onException(Throwable $e);
}

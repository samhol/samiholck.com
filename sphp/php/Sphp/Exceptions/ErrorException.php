<?php

/**
 * ErrorException.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Exceptions;

use ErrorException as PhpErrorException;

/**
 * SPHP-specific Error Exception
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class ErrorException extends PhpErrorException implements SphpException {
  
}

<?php

/**
 * BadMethodCallException.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Exceptions;

use BadMethodCallException as SplBadMethodCallException;

/**
 * SPHP-specific bad method call exception
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class BadMethodCallException extends SplBadMethodCallException implements SphpException {
  
}

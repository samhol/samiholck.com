<?php

/**
 * OutOfRangeException.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Exceptions;

use OutOfRangeException as SplOutOfRangeException;

/**
 * Exception thrown when an illegal index was requested
 * 
 * This represents errors that should be detected at compile time.
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class OutOfRangeException extends SplOutOfRangeException implements SphpException {
  
}

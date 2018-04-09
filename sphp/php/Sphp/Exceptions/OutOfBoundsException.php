<?php

/**
 * OutOfBoundsException.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Exceptions;

use OutOfBoundsException as SplOutOfBoundsException;

/**
 * SPHP-specific out of bounds exception
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class OutOfBoundsException extends SplOutOfBoundsException implements SphpException {
  
}

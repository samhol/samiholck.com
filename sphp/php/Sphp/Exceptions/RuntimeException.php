<?php

/**
 * RuntimeException.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Exceptions;

use RuntimeException as SplRuntimeException;


/**
 * Exception thrown if an error which can only be found on runtime occurs
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class RuntimeException extends SplRuntimeException implements SphpException {

}

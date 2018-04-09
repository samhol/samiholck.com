<?php

/**
 * AbstractReader.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

use Sphp\Exceptions\RuntimeException;

/**
 * Abstract reader implementation
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
abstract class AbstractReader implements Reader {

  public function fromFile($filename) {
    if (!is_file($filename) || !is_readable($filename)) {
      throw new RuntimeException(sprintf("File '%s' doesn't exist or is not readable", $filename));
    }
    return $this->fromString(file_get_contents($filename));
  }

}

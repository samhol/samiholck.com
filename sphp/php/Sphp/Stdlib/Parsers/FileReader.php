<?php

/**
 * FileReader.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

use Sphp\Exceptions\RuntimeException;

/**
 * Defines a file reader
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface FileReader {

  /**
   * Read from a file and create an array
   *
   * @param  string $filename
   * @return mixed
   * @throws RuntimeException if the file doesn't exist or is not readable
   */
  public function fromFile($filename);
}

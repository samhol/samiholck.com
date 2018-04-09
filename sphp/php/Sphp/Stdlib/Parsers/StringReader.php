<?php

/**
 * StringReader.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

/**
 * Defines a string reader
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface StringReader {

  /**
   * Read from a string and create an parses the input
   *
   * @param  string $string
   * @return mixed output 
   */
  public function fromString(string $string);
}

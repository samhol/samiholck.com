<?php

/**
 * Csv.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

use Exception;
use Sphp\Exceptions\RuntimeException;

/**
 * Implements a CSV data reader
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class Csv extends AbstractReader {

  public function fromString(string $string) {
    try {
      return str_getcsv($string, $delimiter = ",", $enclosure = '"', $escape = "\\");
    } catch (Exception $ex) {
      throw new RuntimeException($ex->getMessage(), $ex->getCode(), $ex);
    }
  }

}

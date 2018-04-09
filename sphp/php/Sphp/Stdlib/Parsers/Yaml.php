<?php

/**
 * Yaml.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

use Exception;
use Sphp\Exceptions\RuntimeException;
use Symfony\Component\Yaml\Yaml as SymfonyYaml;

/**
 * Implements a YAML to array reader
 * 
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class Yaml extends AbstractReader {

  public function fromString(string $string) {
    try {
      $data = SymfonyYaml::parse($string);
    } catch (Exception $ex) {
      throw new RuntimeException($ex->getMessage(), $ex->getCode(), $ex);
    }
    return $data;
  }

}

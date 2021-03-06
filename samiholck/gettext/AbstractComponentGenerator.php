<?php

/**
 * AbstractComponentGenerator.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html;

/**
 * Description of AbstractComponentGenerator
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
abstract class AbstractComponentGenerator implements Content {

  use ContentTrait;

  public function getHtml(): string {
    return $this->generate()->getHtml();
  }

  /**
   * Generates an HTML component containing the links
   * 
   * @return Content HTML component containing the links
   */
  abstract public function generate();
}

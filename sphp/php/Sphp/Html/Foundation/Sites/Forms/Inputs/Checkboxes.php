<?php

/**
 * Checkboxes.php (UTF-8)
 * Copyright (c) 2013 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Foundation\Sites\Forms\Inputs;

use Sphp\Html\Forms\Inputs\Checkbox;
use Sphp\Stdlib\Strings;

/**
 * A component containing multiple {@link Checkbox} inputs
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @link    http://foundation.zurb.com/ Foundation
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class Checkboxes extends Choiceboxes {

  public function __construct(string $name = null, $values = array(), $legend = null) {
    parent::__construct('checkbox', $name, $values, $legend);
  }

  /**
   * Sets the value of name attribute
   *
   * @param  string $name the value of the name attribute
   * @return $this for a fluent interface
   * @link   http://www.w3schools.com/tags/att_input_name.asp name attribute
   */
  public function setName(string $name) {
    if (!Strings::endsWith($name, '[]')) {
      $name .= '[]';
    }
    parent::setName($name);
    return $this;
  }

  /**
   * Returns the value of name attribute
   *
   * @return string the value of the name attribute
   * @link   http://www.w3schools.com/tags/att_input_name.asp name attribute
   */
  public function getName() {
    $name = parent::getName();
    return str_replace('[]', '', $name);
  }

}

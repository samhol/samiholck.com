<?php

/**
 * AbstractFilter.php (UTF-8)
 * Copyright (c) 2015 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Filters;

/**
 * An abstract implementation of a filter
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
abstract class AbstractFilter implements FilterInterface {

  /**
   * Executes the filter for the given value
   * 
   * @param  mixed $value the value to filter
   * @return mixed the filtered value
   */
  public function __invoke($value) {
    return $this->filter($value);
  }
}

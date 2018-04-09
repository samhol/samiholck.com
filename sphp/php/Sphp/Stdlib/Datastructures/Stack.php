<?php

/**
 * Stack.php (UTF-8)
 * Copyright (c) 2015 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Datastructures;

use SplStack;
use Sphp\Exceptions\RuntimeException;

/**
 * An implementation of a last-in-first-out (LIFO) stack
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class Stack extends SplStack implements StackInterface {

  public function peek() {
    return $this->top();
  }

  public function push($value) {
    parent::push($value);
    return $this;
  }

  public function pop() {
    try {
      return parent::pop();
    } catch (\Exception $ex) {
      throw new RuntimeException($ex->getMessage(), $ex->getCode(), $ex);
    }
  }

}

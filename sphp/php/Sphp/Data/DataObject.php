<?php

/*
 * The MIT License
 *
 * Copyright 2018 Sami Holck <sami.holck@gmail.com>.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Sphp\Data;

use Sphp\Stdlib\Datastructures\Arrayable;
use ReflectionClass;
use Sphp\Stdlib\Strings;
use Sphp\Exceptions\BadMethodCallException;
use Sphp\Database\Exceptions\InvalidArgumentException;

/**
 * Description of DataObject
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class DataObject implements \ArrayAccess, Arrayable, \IteratorAggregate {

  /**
   * @var array 
   */
  protected $data = [];

  /**
   * @var ReflectionClass 
   */
  private $reflector;

  public function __construct(array $vars) {
    $this->data = $vars;
    $this->reflector = new ReflectionClass($this);
  }

  /**
   * Calls a method
   *
   * @param  string $name the name of the method
   * @param  array $arguments 
   * @return bool|mixed
   * @throws BadMethodCallException
   */
  public function __call(string $name, array $arguments) {
    $varName = lcfirst(preg_replace('/^(has|get|set)/', '', $name));
    if (!$this->validateMethodName($name, $arguments)) {
      //throw new BadMethodCallException("Method $name does not exist");
    } else if (Strings::startsWith($name, 'get')) {
      return $this->data[$varName];
    } else if (Strings::startsWith($name, 'set') && count($arguments) > 0) {
      $this->data[$varName] = $arguments[0];
      return $this;
    } else if (Strings::startsWith($name, 'has')) {
      //$this->data[$varName] = $arguments[0];
      return $this->offsetExists($varName);
    }
  }

  protected function validateMethodName(string $name, array $arguments): bool {
    if (Strings::startsWith($name, 'has')) {
      return true;
    } else {
      $varName = lcfirst(preg_replace('/^(get|set)/', '', $name));
      if (Strings::startsWith($name, 'get')) {
        return array_key_exists($varName, $this->data);
      } else if (Strings::startsWith($name, 'set')) {
        return array_key_exists($varName, $this->data) && count($arguments) > 0;
      }
      return false;
    }
  }

  public function toArray(): array {
    $raw = get_object_vars($this);
    $result = [];
    foreach ($raw as $prop => $val) {
      if ($val instanceof Arrayablerrayable) {
        $result[$prop] = $val->toArray();
      } else if ($val instanceof \Iterator) {
        $result = array_merge($result, $val->toArray());
      } else {
        $result[$prop] = $val;
      }
    }
    return $result;
  }

  public function __toString(): string {

    ;
  }

  public function getIterator(): \Traversable {
    return new \ArrayIterator($this->toArray());
  }

  public function offsetExists($offset): bool {
    return array_key_exists($offset, $this->data);
  }

  public function offsetGet($offset) {
    if ($this->offsetExists($offset)) {
      return $this->data[$offset];
    } else {
      throw new InvalidArgumentException;
    }
  }

  public function offsetSet($offset, $value) { 
    $method  = 'set'.ucfirst($offset);
    $this->$method($value);
  }

  public function offsetUnset($offset) {
    
  }

}

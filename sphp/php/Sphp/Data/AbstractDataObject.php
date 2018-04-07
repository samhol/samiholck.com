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
use ArrayAccess;
use IteratorAggregate;
use ReflectionClass;
use Sphp\Data\Exceptions\DataAttributeException;
use Traversable;

/**
 * Description of DataObject
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
abstract class AbstractDataObject implements ArrayAccess, Arrayable, IteratorAggregate {

  /**
   * @var ReflectionClass 
   */
  private $reflector;

  /**
   * Constructor
   * 
   * @param array|null $data optional data
   */
  public function __construct(array $data = null) {
    $this->reflector = new ReflectionClass($this);
    if ($data !== null) {
      $this->fromArray($data);
    }
  }

  /**
   * Destructor
   */
  public function __destruct() {
    unset($this->reflector);
  }

  /**
   * 
   * @param  array $data
   * @return $this for a fluent interface
   */
  public abstract function fromArray(array $data);

  public function toArray(): array {
    $raw = get_object_vars($this);
    $result = [];
    foreach ($raw as $prop => $val) {
      if ($val instanceof Arrayable) {
        $result[$prop] = $val->toArray();
      } else if ($val instanceof \Iterator) {
        $result[$prop] = array_merge($result, iterator_to_array($val));
      } else {
        $result[$prop] = $val;
      }
    }
    return $result;
  }

  public function toJson(): string {
    return json_encode($this->toArray(), JSON_PRETTY_PRINT);
  }

  public function __toString(): string {
    return $this->toJson();
  }

  public function getIterator(): Traversable {
    return new \ArrayIterator($this->toArray());
  }

  public function offsetExists($offset): bool {
    $getMethod = 'get' . ucfirst($offset);
    $setMethod = 'set' . ucfirst($offset);
    return $this->reflector->hasMethod($getMethod) && $this->reflector->hasMethod($setMethod);
  }

  public function offsetGet($offset) {
    if ($this->offsetExists($offset)) {
      $methodName = 'get' . ucfirst($offset);
      return $this->$methodName();
    } else {
      throw new DataAttributeException("Offset '$offset' does not exist");
    }
  }

  /**
   * 
   * @param  string $offset
   * @param  mixed $value
   * @throws DataAttributeException
   */
  public function offsetSet($offset, $value) {
    if ($this->offsetExists($offset)) {
      $methodName = 'set' . ucfirst($offset);
      $f = $this->reflector->getMethod($methodName);
      if ($f->getNumberOfParameters() > 0 && $f->getNumberOfRequiredParameters() <= 1) {
        $pars = $f->getParameters();
        var_dump($pars[0]->hasType());
        $f->invoke($this, $value);
      } else {
        throw new DataAttributeException("Offset '$offset' does not exist");
      }
    } else {
      throw new DataAttributeException("Setting member variable failed: '$offset' does not exist");
    }
  }

  /**
   * 
   * @param  mixed $offset
   * @throws DataAttributeException
   */
  public function offsetUnset($offset) {
    if ($this->offsetExists($offset)) {
      $methodName = 'set' . ucfirst($offset);
      $reflectionFunc = $this->reflector->getMethod($methodName);
      $pars = $reflectionFunc->getParameters();
      if (count($pars) == 1 && $pars[0]->allowsNull()) {
        //echo 'unsetting';
        $reflectionFunc->invoke($this, null);
      } else {
        throw new DataAttributeException("Unsetting member variable failed: '$offset' cannot be NULL");
      }
    } else {
      throw new DataAttributeException("Unsetting member variable failed: '$offset' does not exist");
    }
  }

}

<?php

/**
 * Observer.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Observers;

/**
 * Defines the observer part of the Observer Design Pattern
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface Observer {

  /**
   * Receives an update from a subject
   * 
   * @param Subject $subject
   */
  public function update(Subject $subject);
}

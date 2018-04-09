<?php

/**
 * EventListenerInterface.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>.
 */

namespace Sphp\Stdlib\Events;

/**
 * Defines an event listener
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface EventListenerInterface {

  /**
   * The method called when a listened event occurs
   *
   * @param EventInterface $event
   */
  public function on(EventInterface $event);
}

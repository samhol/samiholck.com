<?php

/**
 * AccordionMenu.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Foundation\Sites\Navigation;

/**
 * Implements an Accordion menu
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @link    http://foundation.zurb.com/ Foundation
 * @link    http://foundation.zurb.com/docs/components/sidenav.html Foundation Side Nav
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class AccordionMenu extends Menu {

  /**
   * Constructs a new instance
   *
   * @param null|string|Heading $content the top most heading of the Foundation Side Nav
   */
  public function __construct($content = null) {
    parent::__construct($content);
    $this->cssClasses()->protect('vertical accordion-menu');
    $this->attributes()->demand('data-accordion-menu');
  }

  public function append(MenuItemInterface $content) {
    if ($content instanceof SubMenu) {
      $content->vertical(true);
    }
    parent::append($content);
    return $this;
  }

}

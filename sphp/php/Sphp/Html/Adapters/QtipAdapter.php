<?php

/**
 * SPHPlayground Framework (http://playgound.samiholck.com/)
 *
 * @link      https://github.com/samhol/SPHP-framework for the source repository
 * @copyright Copyright (c) 2007-2018 Sami Holck <sami.holck@gmail.com>
 * @license   https://opensource.org/licenses/MIT The MIT License
 */

namespace Sphp\Html\Adapters;

use Sphp\Html\ComponentInterface;
use Sphp\Html\IdentifiableContent;

/**
 * Inserts a qTip style tooltip to the adaptee
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @link    http://qtip2.com/ qTip 2
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class QtipAdapter extends AbstractComponentAdapter {

  /**
   * Constructs a new instance
   * 
   * @param ComponentInterface $component
   */
  public function __construct(ComponentInterface $component, $qtip = null) {
    parent::__construct($component);
    if ($qtip !== null) {
      $this->setQtip($qtip);
    }
  }

  /**
   * Sets the value of the title attribute
   *
   * @param  string|null $qtip the value of the title attribute
   * @return $this for a fluent interface
   * @link   http://www.w3schools.com/tags/att_global_title.asp title attribute
   */
  public function setQtip($qtip) {
    $this->getComponent()->attributes()
            ->set('title', $qtip)
            ->set('data-sphp-qtip', true);
    return $this;
  }

  /**
   * Sets the value of the title attribute
   *
   * @param  string $my 
   * @param  string $at
   * @return $this for a fluent interface
   */
  public function setQtipPosition(string $my, string $at) {
    $this->getComponent()->attributes()
            ->set('data-sphp-qtip', true)
            ->set('data-sphp-qtip-at', $at)
            ->set('data-sphp-qtip-my', $my);
    return $this;
  }

  /**
   * 
   * @param IdentifiableContent $viewport
   * @return $this for a fluent interface
   */
  public function setViewport($viewport) {
    if ($viewport instanceof IdentifiableContent) {
      $id = $viewport->identify();
    }
    $this->attributes()->set('data-sphp-qtip-viewport', "#$id");
    return $this;
  }

}

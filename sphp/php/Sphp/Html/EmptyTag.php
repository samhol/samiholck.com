<?php

/**
 * EmptyTag.php (UTF-8)
 * Copyright (c) 2011 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html;

/**
 * Implements an empty tag
 *
 * Empty tag has only attributes and no content
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class EmptyTag extends AbstractTag {

  private $close = false;

  public function __construct(string $tagName, bool $useCloseTag = false, Attributes\HtmlAttributeManager $attrManager = null) {
    parent::__construct($tagName, $attrManager);
    $this->close = $useCloseTag;
  }

  public function getHtml(): string {
    $output = '<' . $this->getTagName() . $this->attributesToString(). '>';
    if ($this->close) {
      $output .= "</{$this->getTagName()}>";
    }
    return $output;
  }

}

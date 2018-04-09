<?php

/**
 * Article.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Html\Flow;

use Sphp\Html\ContainerTag;

/**
 * Implements an HTML &lt;article&gt; tag
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class Article extends ContainerTag {

  use ContentCreatorTrait;

  /**
   * Constructs a new instance
   * 
   * @param  mixed $content optional content of the component
   */
  public function __construct($content = null) {
    parent::__construct('article', $content);
  }

}

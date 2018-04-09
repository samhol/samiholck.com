<?php

/**
 * Column.php (UTF-8)
 * Copyright (c) 2016 Sami Holck <sami.holck@gmail.com>.
 */

namespace Sphp\Html\Foundation\Sites\Grids;

use Sphp\Html\Div;

/**
 * Implements an abstract Foundation framework based XY Grid Column
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @link    http://foundation.zurb.com/ Foundation
 * @link    https://foundation.zurb.com/sites/docs/xy-grid.html XY Grid
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
abstract class AbstractColumn extends Div implements ColumnInterface {

  /**
   * @var ColumnLayoutManager 
   */
  private $layoutManager;

  /**
   * Constructs a new instance
   *
   * **Important!**
   *
   * Parameter `mixed $content` can be of any type that converts to a string.
   * So also an object of any class that implements magic method `__toString()` 
   * is allowed.
   *
   * @param  mixed $content the content of the column
   * @param  array $layout column layout parameters
   */
  public function __construct($content = null, array $layout = ['auto']) {
    parent::__construct($content);
    $this->layoutManager = new ColumnLayoutManager($this);
    $this->layout()->setLayout($layout);
  }

  public function layout(): ColumnLayoutManagerInterface {
    return $this->layoutManager;
  }

}

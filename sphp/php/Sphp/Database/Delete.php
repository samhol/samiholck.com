<?php

/**
 * Delete.php (UTF-8)
 * Copyright (c) 2013 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Database;

/**
 * Defines a `DELETE` statement
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface Delete extends ConditionalStatement, DataManipulationStatement {

  /**
   * Sets the table from where the data is to be deleted
   *
   * @param  string $table the table
   * @return $this for a fluent interface
   */
  public function from(string $table);
}

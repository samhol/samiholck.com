<?php

/**
 * Update.php (UTF-8)
 * Copyright (c) 2013 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Database;

/**
 * Defines an `UPDATE` statement
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface Update extends DataManipulationStatement, ConditionalStatement {

  /**
   * Sets the table(s) which are updated
   *
   * @param  string $table the table to update
   * @return $this for a fluent interface
   */
  public function table(string $table);

  /**
   * Sets the updating data
   *
   * @param  array $data new data
   * @return $this for a fluent interface
   */
  public function set(array $data);
}

<?php

/**
 * AbstractDelete.php (UTF-8)
 * Copyright (c) 2013 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Database;

/**
 * An abstract implementation of a `DELETE` statement
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
abstract class AbstractDelete extends AbstractConditionalStatement implements Delete {

  /**
   * the target table
   *
   * @var string
   */
  private $table;

  /**
   * Sets the table from where the data is to be deleted
   *
   * @param  string $table the table
   * @return $this for a fluent interface
   */
  public function from(string $table) {
    $this->table = $table;
    return $this;
  }

  public function statementToString(): string {
    return "DELETE FROM `$this->table`" . $this->conditionsToString();
  }

  public function affectRows(): int {
    return $this->execute()->rowCount();
  }

}

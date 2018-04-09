<?php

/**
 * DbObjectInterface.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Database\Doctrine\Objects;

/**
 * Defines common features for all database objects.
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface DbObjectInterface extends ObjectInterface {

  /**
   * Resets all the member values from a given raw data source
   *
   * @param  mixed[] $data raw source data
   * @return $this for a fluent interface
   */
  public function fromArray(array $data = []);
}

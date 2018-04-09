<?php

/**
 * Encoder.php (UTF-8)
 * Copyright (c) 2018 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Stdlib\Parsers;

/**
 * Description of Encoder
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2018-02-13
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface Encoder {

  public function encode(array $config): string;
}

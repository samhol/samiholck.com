<?php

/**
 * TranslatableCollectionInterface.php (UTF-8)
 * Copyright (c) 2013 Sami Holck <sami.holck@gmail.com>.
 */

namespace Sphp\I18n\Collections;

use Traversable;
use Sphp\I18n\Translatable;

/**
 * Defines properties for a collection that holds {@link Translatable} objects
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
interface TranslatableCollectionInterface extends Traversable, Translatable {
  
}

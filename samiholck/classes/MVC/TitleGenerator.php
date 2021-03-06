<?php

/**
 * TitleGenerator.php (UTF-8)
 * Copyright (c) 2014 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Samiholck\MVC;

/**
 * Generates a page title for the given page
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class TitleGenerator {

  private $titleData = [];

  public function __construct(array $data) {
    $this->titleData = $data;
  }

  public function createTitleFor(string $url): string {
    if (array_key_exists($url, $this->titleData)) {
      $title = (string) $this->titleData[$url];
    } else {
      $title = "'$url' | samiholck.com";
      
    }
    return $title;
  }

}

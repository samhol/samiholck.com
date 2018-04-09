<?php

/**
 * SingularTemplate.php (UTF-8)
 * Copyright (c) 2010 Sami Holck <sami.holck@gmail.com>.
 */

namespace Sphp\I18n\Messages;

use Sphp\I18n\TranslatorInterface;

/**
 * Implements a singular translatable object
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license https://opensource.org/licenses/MIT The MIT License
 * @filesource
 */
class SingularMessage extends Message {

  /**
   * original raw message
   *
   * @var string
   */
  private $message;

  /**
   * Constructs a new instance
   *
   * @param string $message
   * @param TranslatorInterface $translator optional translator
   */
  public function __construct(string $message, array $args = [], TranslatorInterface $translator = null) {
    parent::__construct($args, $translator);
    $this->message = $message;
  }

  public function translateWith(TranslatorInterface $translator): string {
    return $translator->vsprintf($this->message, $this->getArguments());
  }

  public function getTemplate(): string {
    return $this->message;
  }

}

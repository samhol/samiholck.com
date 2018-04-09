<?php

/**
 * ContactMailer.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Mail;

/**
 * 
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2017-03-11
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class ContactMailer {

  /**
   * @var string 
   */
  private $sender;

  /**
   * @var string 
   */
  private $receiver;

  /**
   * @var Mailer 
   */
  private $mailer;

  /**
   * Constructs a new instance
   * 
   * @param string $receiver
   */
  public function __construct(string $sender, string $receiver) {
    $this->sender = $sender;
    $this->receiver = $receiver;
    $this->mailer = new Mailer();
  }

  /**
   * 
   * @param  ContactMessage $data
   * @return self for a fluent interface
   */
  public function sendMessage(ContactMessage $data) {
    $this->mailer
            ->setFrom($this->sender)
            ->setTo($this->receiver)
            ->setSubject($data->getSubject())
            ->setBody($this->createMailBody($data))
            ->send();
    return $this;
  }

  /**
   * 
   * @param  ContactData $data
   * @return self for a fluent interface
   */
  public function replyTo(ContactData $data) {
    $this->getMessage()->setFrom($this->sender);
    $this->getMessage()->addTo($data->getEmail());
    $this->getMessage()->setSubject("Thank you for your message");
    $this->getMessage()->setBody('I will get back to you as soon as possible');
    $this->getMessage()->setEncoding('UTF-8');
    $this->send();
    return $this;
  }

  /**
   * 
   * @param  ContactMessage $data
   * @return string mail body as a string
   */
  public function createMailBody(ContactMessage $data): string {
    $mailBody = "Message:\n";
    $mailBody .= $data->getMessage();
    $mailBody .= $this->createContacterData($data);
    return $mailBody;
  }

  public function createContacterData(ContactMessage $data): string {
    $output = '';
    if ($data->getContacter() !== null) {
      $person = $data->getContacter();
      $output .= "\n\n----------------------\n";
      $output .= "Contacter:\n";
      $output .= "\n" . $person->getFullname();
      $output .= "\nemail:   " . $person->getEmail();
      $output .= "\nphone:   " . $person->getPhonenumber();
      $output .= "\naddress: " . $person->getAddress();
      $output .= "\n----------------------\n";
    }
    return $output;
  }

}

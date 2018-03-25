<?php

/**
 * ContactMailer.php (UTF-8)
 * Copyright (c) 2017 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Manual\Contact;

use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail;

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
  private $formAddress;

  /**
   * @var string 
   */
  private $receiver;

  /**
   * Constructs a new instance
   * 
   * @param string $receiver
   */
  public function __construct(string $receiver = null, string $formAddress = null) {
    $this->formAddress = $formAddress;
    $this->receiver = $receiver;
  }

  /**
   * 
   * @param  ContactData $data
   * @return self for a fluent interface
   */
  public function send(ContactData $data) {
    $mail = new Message();
    $mail->setFrom($this->formAddress);
    $mail->addTo($this->receiver);
    $mail->setSubject($data->getSubject());
    $mail->setBody($this->createMailBody($data));
    $mail->setEncoding('UTF-8');
    $transport = new Sendmail();
    $transport->send($mail);
    $this->sendToApplicant($data);
    return $this;
  }

  /**
   * 
   * @param  ContactData $data
   * @return self for a fluent interface
   */
  public function sendToApplicant(ContactData $data) {
    $mail = new Message();
    $mail->setFrom($this->formAddress);
    $mail->addTo($data->getEmail());
    $mail->setSubject("Thank you for your message");
    $mail->setBody('I will get back to you as soon as possible');
    $mail->setEncoding('UTF-8');
    $transport = new Sendmail();
    $transport->send($mail);
    return $this;
  }

  /**
   * 
   * @param  ContactData $data
   * @return string mail body as a string
   */
  protected function createMailBody(ContactData $data): string {
    $mailBody = $data->getMessage();
    $mailBody .= "\n\n----------------------\n";
    $mailBody .= "Sender:\n\n";
    $mailBody .= "Name: \t{$data->getFname()} {$data->getLname()}\n";
    $mailBody .= "Email: \t{$data->getEmail()}\n";
    if ($data->hasPhoneNumber()) {
      $mailBody .= "Phone: \t{$data->getPhoneNumber()}\n";
    }
    $mailBody .= "----------------------\n";
    return $mailBody;
  }

}

<?php

/**
 * ReCaptha.php (UTF-8)
 * Copyright (c) 2018 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Manual\Contact;

/**
 * Description of ReCaptha
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class ReCaptha {

  public static function createImage(string $sitekey) {
    return '<div class="g-recaptcha" data-sitekey="' . $sitekey . '"></div>';
  }

  /**
   * 
   * @param  string $secret
   * @return bool
   */
  public static function isValid(string $secret): bool {
    $response = filter_input(INPUT_POST, 'g-recaptcha-response', FILTER_SANITIZE_STRING);
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $secret, //'6Lfh6U4UAAAAAADk_T1MpBhlLy72QTMES2z_I9QB',
        'response' => $response
    ];
    $query = http_build_query($data);
    $options = [
        'http' => [
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n" .
            "Content-Length: " . strlen($query) . "\r\n",
            'method' => 'POST',
            'content' => $query
        ]
    ];
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);
    return (bool) $captcha_success->success;
  }

}

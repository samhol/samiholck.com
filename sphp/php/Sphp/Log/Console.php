<?php

/**
 * Console.php (UTF-8)
 * Copyright (c) 2018 Sami Holck <sami.holck@gmail.com>
 */

namespace Sphp\Log;

use Sphp\Html\Programming\ScriptCode;

/**
 * Description of Console
 *
 * @author  Sami Holck <sami.holck@gmail.com>
 * @since   2018-03-21
 * @license http://www.gnu.org/licenses/gpl-3.0.html GPLv3
 * @filesource
 */
class Console {

  private $rows = [];

  /**
   * Logs messages/variables/data to browser console from within php
   *
   * @param $name message to be shown for optional data/vars
   * @param $data variable (scalar/mixed) arrays/objects, etc to be logged
   * @param $jsEval whether to apply JS eval() to arrays/objects
   *
   * @return none
   * @author Sarfraz
   */
  public static function log($name, $data = NULL, $jsEval = FALSE) {
    if (!$name)
      return false;

    $isevaled = false;
    $type = ($data || gettype($data)) ? 'Type: ' . gettype($data) : '';

    if ($jsEval && (is_array($data) || is_object($data))) {
      $data = 'eval(' . preg_replace('#[\s\r\n\t\0\x0B]+#', '', json_encode($data)) . ')';
      $isevaled = true;
    } else {
      $data = json_encode($data);
    }

    # sanitalize
    $data = $data ? $data : '';
    $search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
    $replace_array = array('"', '', '', '\\n', '\\n');
    $data = preg_replace($search_array, $replace_array, $data);
    $data = ltrim(rtrim($data, '"'), '"');
    $data = $isevaled ? $data : ($data[0] === "'") ? $data : "'" . $data . "'";

    $js = <<<JSCODE
\n<script>
 // fallback - to deal with IE (or browsers that don't have console)
 if (! window.console) console = {};
 console.log = console.log || function(name, data){};
 // end of fallback

 console.log('$name');
 console.log('------------------------------------------');
 console.log('$type');
 console.log($data);
 console.log('\\n');
</script>
JSCODE;

    echo $js;
  }

  protected function createLog(string $type, string $data) {

    $data = $data ? $data : '';
    $search_array = array("#'#", '#""#', "#''#", "#\n#", "#\r\n#");
    $replace_array = array('"', '', '', '\\n', '\\n');
    $data = preg_replace($search_array, $replace_array, $data);
    $data = ltrim(rtrim($data, '"'), '"');
    return "console.$type('$data')";
  }

  public function addLog(string $logText) {
    $this->rows[] = ['type' => 'log', 'message' => $logText];
    return $this;
  }

  public function run() {
    if (empty($this->rows)) {
      return $this;
    }
    $js = "if(!window.console) console = {};console.log=console.log || function(name,data){};";
    $scriptTag = new ScriptCode();
    $scriptTag->append($js);
    foreach ($this->rows as $row) {
      $scriptTag->append($this->createLog($row['type'], $row['message']));
    }
    echo $scriptTag;
    return $this;
  }

}

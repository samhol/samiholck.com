<?php

namespace Sphp\Config;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once(__DIR__ . '/../sphp/settings.php');
namespace Sphp\Config\ErrorHandling;

$handler = new ErrorDispatcher();
// Attach an Exception Logger
$handler->addExceptionListener(new ExceptionLogger(__DIR__ . '/logs/exception_log.log'));
$handler->addExceptionListener((new ExceptionPrinter())->showTrace());
namespace Sphp\Config;
(new PHPConfig())
        ->setErrorReporting(E_ALL)
        ->setDefaultTimezone('Europe/Helsinki')
        ->setCharacterEncoding('UTF-8')
        ->setMessageLocale('fi_FI');

session_start();

use Sphp\Stdlib\Parser;
//$config = new Config(Parser::fromFile(__DIR__ . '/settings.yml'));

namespace Sphp\MVC;
require_once 'loaders.php';

$router = new Router();
$router->route('/', $loadIndex);
$router->route('/kilpailut/kalastus/<#year>', $loadFishingCompetition);
$router->route('/kilpailut/purjehdus/<#year>', $loadSailingCompetition);
$router->route('/<:pagename>', $loadPage);
$router->route('/' . date('Y'), $seasonSchedule);
//$router->route('/kilpailut/<*categories>', $loadCompetition);
$router->setDefaultRoute($loadNotFound);

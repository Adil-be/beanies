<?php

require_once 'include/autoload.php';
require_once 'src/Model/Page.php';
require_once 'include/config.inc.php';

use Model\Page;

$page = new Page($_GET);

$pageName = $page->getName();
$controllerClass = $page->getController();
$controller = new $controllerClass($pageName, $db);
$controller->render();


?>
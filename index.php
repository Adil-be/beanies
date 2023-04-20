<?php
require_once 'classes/Page.php';
$page = new Page($_GET);

ob_start();
include 'include/header.php';
include 'pages/' . $page->getName() . '.php';
include 'include/footer.php';
ob_end_flush();

?>
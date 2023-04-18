<?php

$pages = [
    'home' => 'Chez beanies',
    'list' => 'tous nos beanies',
    'login' => 'Connection',
    'cart' => 'Panier',
    'contact' => 'nous contacter',
    'logout' => '',
];

$page = 'home';

if (isset($_GET['page']) && array_key_exists($_GET['page'], $pages)) {
    $page = $_GET['page'];
}
$title = $pages[$page];
ob_start();
include 'include/header.php';
include 'pages/' . $page . '.php';
include 'include/footer.php';
ob_end_flush();

?>
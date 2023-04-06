<?php

$pages=[
    'home'=>'Chez beanies',
    'list'=>'tous nos beanies',
    'login'=>'Connection',
    'logout'=>'',
];

$page ='home';

if(isset($_GET['page']) && array_key_exists($_GET['page'], $pages) ){
    $page=$_GET['page'];
}

$title = $pages[$page];


ob_start();
require_once 'include/header.php';

require_once 'pages/'.$page.'.php';
require_once 'include/footer.php';

ob_end_flush();
?>

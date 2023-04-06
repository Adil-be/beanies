<?php 
$title ='deconnection';
require_once 'include/header.php';
session_destroy();
header("Location: index.php?login=disconnected");
 ?>
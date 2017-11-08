<?php
session_start();
if(!isset( $_SESSION['h'] ))
{
    $arr = array();
    $_SESSION['h'] = $arr;
}


$item = $_GET['item'];
$_SESSION['h'][] = $_GET['item'];; 

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
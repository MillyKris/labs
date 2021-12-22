<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/tables.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/logic.php'); 

var_dump($_GET);
$id = $_GET['data-id-item'];
$var = userLogic::getById($id);
var_dump($var);
<?php
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/tables.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/logic.php');
echo "QQQQ";
if('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['data-id-item'])){
	$id = $_GET['data-id-item'];
	echo $id;
	$ar = userLogic::getImage($id);
	$filepath = $_SERVER['DOCUMENT_ROOT'] . '/L7/'.$ar[0]["img_path"];
	echo $filepath;
	unlink($filepath);
	$errors = userLogic::delete($id);
	if(strlen($errors) > 0){
		header(header:"Location:../courses.php?success=0");
	}
	header(header:"Location:../courses.php?success=1");
}
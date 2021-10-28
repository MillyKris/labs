<?php
//session_start();
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/diffunctions.php');

class userActions
{
	public static function signIn() :string{
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return "";
		}
		$message = UserLogic::signIn($_POST['email'], $_POST['password']);
		return $message;
	}
	public static function signUp() :string{
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return "";
		}
		$message = UserLogic::signUp($_POST['email'], $_POST['fullName'], $_POST['bloodtype'], $_POST['factor'], $_POST['vk'], $_POST['password'], $_POST['dateOfBirth'], $_POST['address'], $_POST['gender'], $_POST['interests'], $_POST['password2']);
		/*if(!strlen($message)){
			header('Location: ' . $_SERVER['PHP_SELF'] . '?success=y');
			die();
		}*/
		return $message;
	}
}
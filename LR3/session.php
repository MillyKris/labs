<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/connect.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/tableUser.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/userLogic.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/userActions.php');
//session_start();
$username = "";
$message = "";
if(userLogic::isAuthorized()){
	$currentUser = UserLogic::current();
	$username = $currentUser['email'];
	$message = "Вы авторизованы как ".$username;

}
else{
	if(gettype(checkData()) != "string"){
		$prev_page = (empty($_SERVER['HTTP_REFERER']))?"%web%":$_SERVER['HTTP_REFERER'];
		if(str_contains($prev_page, "register.php")){
			$message = userActions::signUp();
			if(str_contains($message, "успешно")){
				header(header: 'Location:web-applications.php');
				exit();
			}
		}
		else if(str_contains($prev_page, "authorization.php")){
			$message = userActions::signIn();
			if(str_contains($message, "успешно")){
				header(header: 'Location:web-applications.php');
				exit();
			}
		} 
	} 
	else {
		$message = "Ошибочное заполнение полей<br>";
		$message = checkData();
	}
}

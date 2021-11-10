
<?php
function clearData($var){
	return trim(strip_tags($var));
}
function checkFormat($data, $type){
	switch($type){
		case "email":
			$pattern = '/^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/';
			if(preg_match($pattern, $data)){
				return true;
			}
			break;
		case "password":
			$pattern = '/^[a-zA-zа-яА-Я0-9 \@\!\?\#\$\%\^\&\*\-\_\+\=]{6,}$/';
			if(preg_match($pattern, $data)){
				return true;
			}
			break;
		case "fullName":
			$pattern = '/^[a-zA-zа-яА-Я ]{3,}$/';
			if(preg_match($pattern, $data)){
				return true;
			}
			break;
	}
	return false;
}
function checkData(){
		if(empty($_POST)) return;
		$errors = "";
		$_POST['email'] = clearData($_POST['email']);
		if(!checkFormat($_POST['email'], "email")) 
			$errors .= "Некорректный email<br>";

		$_POST['password'] = clearData($_POST['password']);
		if(!checkFormat($_POST['password'], "password")) 
			$errors .= "Некорректный пароль<br>";
		

		if(isset($_POST['password2'])){
			$_POST['password2'] = clearData($_POST['password2']);
			if(!checkFormat($_POST['password2'], "password"))
				$errors .= "Некорректный пароль<br>";
			$_POST['fullName'] = clearData($_POST['fullName']);
			$_POST['dateOfBirth'] = clearData($_POST['dateOfBirth']);
			if(!checkFormat($_POST['fullName'], "fullName"))
				$errors .= "Некорректное имя пользователя<br>";
			$_POST['vk'] = clearData($_POST['vk']);
			$_POST['address'] = clearData($_POST['address']);
			$_POST['interests'] = clearData($_POST['interests']);
		}
		if(strlen($errors) > 0) return $errors;
		return true;
}

<?php 
session_start();
class userLogic
{
	public static function signUp(string $email, string $fullName, int $bloodType, string $factor, string $vk, string $password, string $dateOfBirth, string $address, string $gender, string $interests, string $password2) :string{
			///регистрируем пользователя, возвращаем ошибки
			if(strcmp($password, $password2) != 0) return "Пароли не совпадают". $password . "   ".$password;
				if(static::isAuthorized()){
					return "Вы уже авторизованы";
				}
				$user = UserTable::getByEmail($email);
				if(!empty($user)){
					return "Пользователь с такой почтой уже есть. <a href = 'authorization.php'>Авторизуйтесь</a>";
				}
				if(!UserTable::create($email, $fullName, $bloodType, $factor,  $vk, $password, $dateOfBirth,  $address, $gender, $interests))
					return "При добавлении пользователя возникла ошибка(Logic)";
				$user = UserTable::getById(Database::lastInsertId());
				if(null == $user){
					return "Такой пользователь не найден";
				}
				$_SESSION['USER-ID'] = $user['user-id'];
				return "";
	}

	public static function signIn(string $email, string $password) : string{
		if(static::isAuthorized()){
			return "Вы уже авторизованы<br>";
		}
		$user = UserTable::getByEmail($email);
		if(null == $user){
			return "Пользователь с такой почтой не найден<br>";
		}
		if(!password_verify($password, $user['password'])){
			return "Неверно указан пароль";
		}
		//if($password != $user['password']) return "Неверно указан пароль<br>";
		$_SESSION['USER-ID'] = $user['user-id'];
		return "";
	}
	public static function isAuthorized() :bool{
		if(array_key_exists('USER-ID', $_SESSION))
			return intval($_SESSION['USER-ID']) > 0;
		return false;
	}
	public static function current() :array{
		if(!static::isAuthorized()){
			return null;
		}
		return UserTable::getById($_SESSION['USER-ID']);
	}
}

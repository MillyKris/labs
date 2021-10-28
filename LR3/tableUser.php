<?php 
//session_start();
class UserTable
{
	public static function create(string $email, string $fullName, int $bloodType, string $factor, string $vk, string $password, string $dateOfBirth, string $address, string $gender, string $interests){
		$query =  Database::prepare('INSERT INTO `users` (`email`, `password`, `fullName`, `dateOfBirth`, `address`, `gender`, `interests`, `vk`, `bloodType`, `factor`) VALUES (:email, :password, :fullName, :dateOfBirth, :address, :gender, :interests, :vk, :bloodType, :factor);');
		//print_r($query->errorInfo());
		//print_r($_POST);
		$password = password_hash($password, PASSWORD_DEFAULT);
		$query->bindValue(":email", $email);
		$query->bindValue(":password", $password);
		$query->bindValue(":fullName", $fullName);
		$query->bindValue(":dateOfBirth", $dateOfBirth);
		$query->bindValue(":address", $address);
		$query->bindValue(":gender", $gender);
		$query->bindValue(":interests", $interests);
		$query->bindValue(":vk", $vk);
		$query->bindValue(":bloodType", $bloodType, PDO::PARAM_INT);
		$query->bindValue(":factor", $factor);
		if(!$query->execute()){
			throw new PDOException("При добавлении пользователя возникла ошибка(tableUser)");
		}
		return true;
	}
	public static function getByEmail(string $email) : array{
		$query = Database::prepare('SELECT * FROM `users` WHERE `email` = :email LIMIT 1;');
		$query->bindValue(":email", $email);
		$query->execute();
		$users = $query->fetchAll();
		if(!count($users)){
			return (array)NULL;
		}
		return $users[0];
	}
	public static function getById(int $lastInsertId) : array{
		$query = Database::prepare('SELECT * FROM `users` WHERE `user-id` = :userId LIMIT 1');
		$query->bindValue(':userId', $lastInsertId, PDO::PARAM_INT);
		$query->execute();
		$users = $query->fetchAll();
		if(!count($users)){
			return null;
		}
		return $users[0];
	}
}
<?php 
class userLogic{
	public static function viewAll(){
		$array = courseTable::selectAll();
		if($array === null){
			return "Ошибка: не удалось извлечь данные";
		}
		return $array;
	}
	public static function insert(string $name, int $teacher, string $program, int $cost, $file){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return "";
		}
		if(!courseTable::insert($name, $teacher, $program, $cost, $file)){
			$message = "Ошибка:<br>";
			return $message.PDO::errorInfo();
		}
		return "";
	}
	public static function getTeachersType(){
		$array = teachersTable::getTeachersType();
		if($array === null){
			return "Ошибка: не удалось извлечь данные";
		}
		return $array;
	}
}
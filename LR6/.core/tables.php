<?php 
class courseTable
{
	public static function selectAll(){
		$query = Database::prepare('SELECT `course-id`, `img_path`, `name`,  `program`, `cost`, `id-teacher-type` FROM `courses` ORDER BY `name`;');
		$query->execute();
		$courses = $query->fetchAll();
		if(!count($courses)){
			return null;
		}
		return $courses;
	}
	public static function insert(string $name, int $teacher, string $program, int $cost, $file){
		$query =  Database::prepare('INSERT INTO `courses` (`img_path`, `name`, `id-teacher-type`, `program`, `cost`) VALUES (:img, :name, :idTeacherType, :program, :cost);');
		$query->bindValue(":img", $file);
		$query->bindValue(":name", $name);
		$query->bindValue(":idTeacherType", $teacher);
		$query->bindValue(":program", $program);
		$query->bindValue(":cost", $cost);
		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(courseTable)");
			return false;
		}
		return true;
	}
}
class teachersTable
{
	public static function getTeachersType(){
		$query = Database::prepare("SELECT * FROM `teachers_types`");
		if(!$query->execute()){
			throw new PDOException("При чтении возникла ошибка(teachersTable)");
			return false;
		}
		$teachers = $query->fetchAll();
		if(!count($teachers)){
			return false;
		}
		return $teachers;
	}
}

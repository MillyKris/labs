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
	public static function delete($id){
		$query = Database::prepare('DELETE FROM `courses` WHERE `course-id`= :id');
		$query->bindValue(":id", $id);
		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(courseTable)");
			return false;
		}
		return true;
	}
	public static function getImage($id){
		$query = Database::prepare('SELECT `img_path` FROM `courses` WHERE `course-id`=:id;');
		$query->bindValue(":id", $id);
		$query->execute();
		$courses = $query->fetchAll();
		if(!count($courses)){
			return null;
		}
		return $courses;
	}
	public static function update(int $id, string $name, int $teacher, string $program, int $cost, $file){
		$query =  Database::prepare('UPDATE `courses` SET `img_path` = :img, `name` = :name, `id-teacher-type` = :idTeacherType, `program` = :program, `cost` = :cost WHERE `course-id` = :id;');
		
		$query->bindValue(":img", $file);
		$query->bindValue(":name", $name);
		$query->bindValue(":idTeacherType", $teacher);
		$query->bindValue(":program", $program);
		$query->bindValue(":cost", $cost);
		$query->bindValue(":id", $id);
		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(courseTable)");
			return false;
		}
		return true;

	}
	public static function getById($id){
		$query = Database::prepare('SELECT * FROM `courses` WHERE `course-id`=:id;');
		$query->bindValue(":id", $id);
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
class teachersTable{
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
	public static function insert(string $type){
		$query =  Database::prepare('INSERT INTO `teachers_types` (`type-name`) VALUES (:type);');
		$query->bindValue(":type", $type);
		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(teachersTable)");
			return false;
		}
		return true;
	}
	public static function getById($id){
		$query = Database::prepare('SELECT * FROM `teachers_types` WHERE `type-id`=:id;');
		$query->bindValue(":id", $id);
		$query->execute();
		$teachers = $query->fetchAll();
		if(!count($teachers)){
			return null;
		}
		return $teachers;
	}
	public static function update(int $id, string $type){
		$query =  Database::prepare('UPDATE `teachers_types` SET `type-name` = :type WHERE `type-id` = :id;');
		$query->bindValue(":type", $type);
		$query->bindValue(":id", $id);
		if(!$query->execute()){
			throw new PDOException("При добавлении записи возникла ошибка(teachersTable)");
			return false;
		}
		return true;
	}
	public static function delete($id){
		$query = Database::prepare('DELETE FROM `teachers_types` WHERE `type-id`= :id');
		$query->bindValue(":id", $id);
		if(!$query->execute()){
			throw new PDOException("При удалении записи возникла ошибка(teachersTable)");
			return false;
		}
		return true;
	}
}
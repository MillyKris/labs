<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/tables.php');


class courseActions{
	public static $message = "";

	public static function getMessage(){
		return self::$message;
	}

	public static function viewAll(){
		$array = courseTable::selectAll();
		if($array === null){
			self::$message .= "Ошибка: не удалось извлечь данные (courses)";
			return null;
		}
		return $array;
	}

	public static function insert(){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}
		if(!empty($_POST)){
			$name = self::checkData($_POST['name'], 'text');
			$teacher = ($_POST['teacher'] != 0) ? $_POST['teacher'] : 1;
			$program = self::checkData($_POST['program'], 'text');
			$cost = $_POST['cost'];
			if (is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
				$file = self::checkData($_FILES['image'], 'file');
				if($file === null){
					self::$message .= "Ошибка загрузки ";
					return null;
				}
			}
			else {
				self::$message .= "Ошибка загрузки файла: Файл слишком большой ".$_FILES['image']['error'];
				return null;
			}
			if(!courseTable::insert($name, $teacher, $program, $cost, $file)){
				self::$message .= "Ошибка:<br>".PDO::errorInfo();
				return null;
			}
			return true;
		}
	}

	public static function update($id){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}
		if(!empty($_POST)){
			$name = self::checkData($_POST['name'], 'text');
			$teacher = $_POST['teacher'];
			$program = self::checkData($_POST['program'], 'text');
			$cost = $_POST['cost'];
			if(!($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE)){
				if (is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
					$file = self::checkData($_FILES['image'], 'file');
					if($file === null){
						self::$message .= "Ошибка загрузки ";
						return null;
					}
					$ar = courseTable::getImage($id);
					$filepath = $_SERVER['DOCUMENT_ROOT'] . '/LR2.1/'.$ar[0]["img_path"];
					unlink($filepath);
				}
				else {
					self::$message .= "Ошибка загрузки файла: Файл слишком большой ".$_FILES['image']['error'];
					return null;
				}
			}
			else{
				$ar = courseTable::getImage($id);
				if($ar !== null) $file = $ar[0]['img_path'];
				else{
					self::$message .= "Картинка не найдена";
					return null;
				}
			} 
			if(!courseTable::update($id, $name, $teacher, $program, $cost, $file)){
				self::$message .= "Ошибка:<br>".PDO::errorInfo();
				return null;
			}
			return true;
		}
	}

	public static function delete($id){
		if(!courseTable::delete($id)){
			self::$message .= "Ошибка:<br>".PDO::errorInfo();
			return null;
		}
		return true;
	}

	public static function fillEdit($id){
		$record = courseTable::getById($id);
		return $record[0];
	}
	public static function checkData($check, $type){
		switch($type){
			case 'text':
				$check = strip_tags($check);
				return $check;
			break;
			case "file":
				if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){ 
							$fileTmpPath = $_FILES['image']['tmp_name'];
							$fileName = $_FILES['image']['name'];
							$fileSize = $_FILES['image']['size'];
							$fileNameCmps = explode(".", $fileName);
	    					$fileExtension = strtolower(end($fileNameCmps));
							$newFileName = substr(md5(time() . $fileName), 0, 15) . '.' . $fileExtension;
							$allowedfileExtensions = array('jpg', 'gif', 'png', 'jpeg', 'ico');
							if (in_array($fileExtension, $allowedfileExtensions)) {
								$uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/LR2.1/catalogue-img/';
								$dest_path = $uploadFileDir . $newFileName;
								if(!move_uploaded_file($fileTmpPath, $dest_path))
								{
								  self::$message .='Не удалось переместить файл ';
								}
								//chmod($dest_path, 0644);
								$dest_path = 'catalogue-img/'.$newFileName;
								return $dest_path;
							}
							else{ 
								self::$message .= 'Недопустимый формат файла ';
								return null;
							} 
				}
				else if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK){
					self::$message .= "Ошибка загрузки файла ".$_FILES['image']['error'];
					return null;
				} 
			break;
		}
	}
}



class teachersActions{
	public static $message = "";

	public static function getMessage(){
		return self::$message;
	}

	public static function viewAll(){
		$array = teachersTable::getTeachersType();
		if($array === null){
			self::$message .= "Ошибка: не удалось извлечь данные (teachers)";
			return null;
		}
		return $array;
	}

	public static function update($id, $type){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}
		if(!empty($_POST)){
			$type = self::checkData($_POST['type-name']);
			
			if(!teachersTable::update($id, $type)){
				self::$message .= "Ошибка:<br>".PDO::errorInfo();
				return null;
			}
			return true;
		}
	}

	public static function insert(){
		if('POST' != $_SERVER['REQUEST_METHOD']){
			return null;
		}
		if(!empty($_POST)){
			$type = self::checkData($_POST['type-name']);
			if(!teachersTable::insert($type)){
				self::$message .= "Ошибка:<br>".PDO::errorInfo();
				return null;
			}
			return true;
		}
	}

	public static function delete($id){
		if(!teachersTable::delete($id)){
			self::$message .= "Ошибка:<br>".PDO::errorInfo();
			return null;
		}
		return true;
	}

	public static function fillEdit($id){
		$record = teachersTable::getById($id);
		return $record[0];
	}
	public static function checkData($check){
		$check = strip_tags($check);
		return $check;	
	}
}






$typesTeachers = teachersActions::viewAll();

$prev_page = (empty($_SERVER['HTTP_REFERER']))?"":$_SERVER['HTTP_REFERER'];
if(str_contains($prev_page, "editCourse.php") && isset($_POST['id'])){
	$id = $_POST['id'];
	courseActions::update($id);
} 
if(str_contains($prev_page, "editTeacher.php") && isset($_POST['id'])){
	$id = (int)$_POST['id'];
	$type = $_POST['type-name'];
	teachersActions::update($id, $type);
} 

if(str_contains($prev_page, "createCourse.php")){
	courseActions::insert();
}
if(str_contains($prev_page, "createTeacher.php")){
	teachersActions::insert();
}
if(str_contains($prev_page, "courses.php")){
	if('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['data-id-item']) && $_GET['data-id-item'] < 0){
		$id = abs($_GET['data-id-item']);
		$ar = courseTable::getImage($id);
		$filepath = $_SERVER['DOCUMENT_ROOT'] . '/LR2.1/'.$ar[0]["img_path"];
		//echo $filepath;
		unlink($filepath);
		courseActions::delete($id);
		header(header:"Location:../courses.php");
		die();
	}	
}
if(str_contains($prev_page, "teachers.php")){
	if('GET' == $_SERVER['REQUEST_METHOD'] && isset($_GET['data-id-item']) && $_GET['data-id-item'] < 0){
		$id = abs($_GET['data-id-item']);
		teachersActions::delete($id);
		header(header:"Location:../teachers.php");
		die();
	}	
}

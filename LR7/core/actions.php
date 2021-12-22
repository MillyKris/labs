<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/connect.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/tables.php');
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/logic.php');

 $message = "";

function fillEdit($id){
	$record = userLogic::getById($id);
	return $record[0];
}

function update($id){
	global $message;
	if(!empty($_POST)){
		$name = checkData($_POST['name'], 'text');
		$teacher = ($_POST['teacher'] != 0) ? $_POST['teacher'] : 1;
		$program = checkData($_POST['program'], 'text');
		$cost = $_POST['cost'];
		if(!($_FILES['image']['error'] === UPLOAD_ERR_NO_FILE)){
			if (is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
				$file = checkData($_FILES['image'], 'file');
				if($file === null){
					$message .= "Ошибка загрузки ";
					return;
				}
				$ar = userLogic::getImage($id);
				$filepath = $_SERVER['DOCUMENT_ROOT'] . '/L7/'.$ar[0]["img_path"];
				unlink($filepath);
			}
			else {
				$message .= "Ошибка загрузки файла: Файл слишком большой ".$_FILES['image']['error'];
				return;
			}
		}
		else{
			$ar = userLogic::getImage($id);
			$file = $ar[0]['img_path'];
		} 
		
		$errors = userLogic::update($id, $name, $teacher, $program, $cost, $file);
		if(strlen($errors) > 0){
			$message .= $errors;
			return 0;
		}
		else{
			$message = "<h2>Запись успешно изменена</h2>";
			return 1;
		} 
	}
}




function viewAll(){
	global $message;
	$result = userLogic::viewAll();
	if(gettype($result) == 'string'){
		$message .= $result;
		return null;
	}
	return $result;
}


function fillSelect(){
	global $message;
	$typesTeachers = userLogic::getTeachersType();
	if(gettype($typesTeachers) == 'string'){
		$message .= $typesTeachers;
		return null;
	}
	return $typesTeachers;
}

function addData(){
	global $message;
	if(!empty($_POST)){
		$name = checkData($_POST['name'], 'text');
		$teacher = ($_POST['teacher'] != 0) ? $_POST['teacher'] : 1;
		$program = checkData($_POST['program'], 'text');
		$cost = $_POST['cost'];
		if (is_uploaded_file($_FILES['image']['tmp_name']) && $_FILES['image']['error'] === UPLOAD_ERR_OK){
			$file = checkData($_FILES['image'], 'file');
			if($file === null){
				$message .= "Ошибка загрузки ";
				return;
			}
		}
		else {
			$message .= "Ошибка загрузки файла: Файл слишком большой ".$_FILES['image']['error'];
			return;
		}
		$errors = userLogic::insert($name, $teacher, $program, $cost, $file);
		if(strlen($errors) > 0)
			$message .= $errors;
		else $message = "<h2>Запись успешно добавлена</h2>";
	}
}

function checkData($check, $type){
	global $message;
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
							$uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/L7/catalogue-img/';
							$dest_path = $uploadFileDir . $newFileName;
							if(!move_uploaded_file($fileTmpPath, $dest_path))
							{
							  $message .='Не удалось переместить файл ';
							}
							//chmod($dest_path, 0644);
							$dest_path = 'catalogue-img/'.$newFileName;
							return $dest_path;
						}
						else{ 
							$message .= 'Недопустимый формат файла ';
							return null;
						} 
			}
			else if(isset($_FILES['image']) && $_FILES['image']['error'] !== UPLOAD_ERR_OK){
				$message .= "Ошибка загрузки файла ".$_FILES['image']['error'];
				return null;
			} 
		break;
	}
}



$result = viewAll();
$typesTeachers = fillSelect(); //-здесь полностью таблица с учителями





$prev_page = (empty($_SERVER['HTTP_REFERER']))?"%web%":$_SERVER['HTTP_REFERER'];
if(str_contains($prev_page, "add.php")){
	addData();
}
else if(str_contains($prev_page, "edit.php") && isset($_POST['id'])){
	$id = $_POST['id'];
	update($id);
} 
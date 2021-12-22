<?php 
require_once ("connect.php");

function export($db){
	$query = "SELECT * FROM `courses`";
	$array = $db->prepare($query);
	$array->execute();
	$records = $array->fetchAll(PDO::FETCH_ASSOC);
	$a = createCSV($records);
	return $a;
}

function createCSV($data){
	if(!is_array($data))
		return false;
	$path = '/LR5/export/new.csv';
	$CSV_str = '';
	foreach($data as $row){
		$cols = array();
		foreach($row as $col_val){
			if(isset($col_val) && preg_match('/[",;\r\n]/', $col_val)){
				$col_val = str_replace( "\r\n", '\n', $col_val );
				$col_val = str_replace( "\r", '', $col_val );
				$col_val = str_replace( '"', '""', $col_val );
				$col_val = '"'. $col_val .'"';
			}
			$cols[] = $col_val;
		}
		$CSV_str .= implode(",", $cols) . "\r\n" ;
	}
	$CSV_str = rtrim( $CSV_str, "\r\n");
	$done = file_put_contents($_SERVER['DOCUMENT_ROOT'] . $path, $CSV_str );
	return $done ? $path : false;
}



$message = "";
$countRecords = 0;
function import($db){
	global $message;
	global $countRecords;
	if(checkFile()){
		$path = checkFile();
		$isTable = $db->prepare("SHOW TABLES FROM `coursera` LIKE 'courses_imported';");
		$isTable->execute();
		$res = $isTable->fetchAll();
		if(empty($res)){
			$query = "CREATE TABLE `courses_imported`(`course-id` int, `img_path` varchar(45), `name`varchar(45), `id-teacher-type`int(10), `program`varchar(255), `cost` int(11));";
			$array = $db->prepare($query);
			if(!$array->execute()){
				$message .= "Can`t create new table";
			}
		}
		$handle = fopen($path, 'r');
		if($handle === false) die("Can`t open imported file");
		while(false !== ($row = fgetcsv($handle, 5000, ','))){
			$errors = false;
			if(count($row) != 6){
				$message .= "Число столбцов не совпадает (6)";
				$errors = true;
			}
			if(!preg_match('/^[1-9]+[0-9]*$/', $row[0]) || !preg_match('/^[1-9]+[0-9]*$/', $row[3])){
				$message .= "ID - целое положительное число";
				$errors = true;
			} 
			if(!preg_match('/^[1-9]+[0-9]{1,5}$/', $row[5])){
				$message .= "Стоимость - не менее 10\$";
				$errors = true;
			}
			if(!$errors){
				if(!insert($row, $db)){
					$message .= "Can`t add row";
				}
				$countRecords++;
			}
		}
		fclose($handle);
	}
}

function insert($array, $db){
	$query =  $db->prepare('INSERT INTO `courses_imported` (`course-id`, `img_path`, `name`, `id-teacher-type`, `program`, `cost`) VALUES (:id, :img, :name, :idTeacherType, :program, :cost);');
	$query->bindValue(":id", $array[0]);
	$query->bindValue(":img", $array[1]);
	$query->bindValue(":name", $array[2]);
	$query->bindValue(":idTeacherType", $array[3]);
	$query->bindValue(":program", $array[4]);
	$query->bindValue(":cost", $array[5]);
	if(!$query->execute()) return false;
	return true;
}

function checkFile(){
	global $message;
	if (isset($_FILES['import']) && $_FILES['import']['error'] === UPLOAD_ERR_OK){ 
		$fileTmpPath = $_FILES['import']['tmp_name'];
		$fileName = $_FILES['import']['name'];
		$fileSize = $_FILES['import']['size'];
		$fileNameCmps = explode(".", $fileName);
		$fileExtension = strtolower(end($fileNameCmps));
		$newFileName = substr(md5(time() . $fileName), 0, 15) . '.' . $fileExtension;
		$allowedfileExtensions = 'csv';
		if ($fileExtension == $allowedfileExtensions) {
			$uploadFileDir = $_SERVER['DOCUMENT_ROOT'] . '/LR5/import/';
			$dest_path = $uploadFileDir . $newFileName;
			move_uploaded_file($fileTmpPath, $dest_path);
			chmod($dest_path, 0644);
			$dest_path = 'import/'.$newFileName;
			return $dest_path;
		}
		else{ 
			$message .= 'Недопустимый формат файла ';
			return false;
		} 
	}
}

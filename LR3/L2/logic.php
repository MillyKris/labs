<?php
    require_once 'connect.php';
/*Option*/
$types = $db->prepare("SELECT * FROM `teachers_types`");
$types->execute();
$teachers = $types->fetchAll(PDO::FETCH_ASSOC);
/*Filter*/
    $arBinds = [];
    $prevData = [];
    $array = [];
    $sql2 = "SELECT `course-id`, img_path, name, `type-id`, `type-name`, program, cost FROM `courses` INNER JOIN `teachers_types` ON `type-id` = `id-teacher-type`";
    $needWHERE = false;
if(!array_key_exists('clearFilter', $_GET)){
    if(count($_GET) > 0){
        foreach($_GET as $item){
            if($item){
                $needWHERE = true;
                break;
            }
        }
        $prevData = $_GET;
        if($needWHERE) $sql2 .= " WHERE ";
        $isAnd = false;
        if($_GET['courseName']){
            $sql2 .= " `name` LIKE :courseName";                 
            $isAnd = true; 
            $arBinds['courseName'] = htmlspecialchars("%{$_GET['courseName']}%");
        }
        if($_GET['costFrom']){
            if($isAnd) $sql2 .= " AND ";
            $sql2 .= "`cost` > :costFrom ";
            $isAnd = true;
            $arBinds['costFrom'] = htmlspecialchars($_GET['costFrom']);
        }
        if($_GET['costTo']){
            if($isAnd) $sql2 .= " AND ";
            $sql2 .= "`cost` < :costTo ";
            $isAnd = true;
            $arBinds['costTo'] = htmlspecialchars($_GET['costTo']);
        }
        if($_GET['program']){
            if($isAnd) $sql2 .= " AND ";
            $isAnd = true;
            $sql2 .= " `program` LIKE :program";
            $arBinds['program'] = htmlspecialchars("%{$_GET['program']}%");
        }
        if($_GET['teacher']){
            if($isAnd) $sql2 .= " AND ";
            $sql2 .= "teachers_types.`type-id` = :teacher";
            $arBinds['teacher'] = htmlspecialchars($_GET['teacher']);
        }
    }
}
$sql2.=";";
$stmt = $db->prepare($sql2);
$result = $stmt->execute($arBinds);
$array = $stmt->fetchAll(PDO::FETCH_ASSOC);
if(!count($array))
     $arrayCondition = 0;    
else $arrayCondition = 1;
<?php
    require_once 'connect.php';
/*Full array*/
$sql = "SELECT `course-id`, img_path, name, `type-id`, `type-name`, program, cost FROM `courses` INNER JOIN `teachers_types` ON `type-id` = `id-teacher-type`;";
$arrayCondition = 3;
$query = $db->prepare($sql);
$query->execute();
$array = $query->fetchAll(PDO::FETCH_ASSOC);
if(!count($array)){
    echo "Array is empty";
    $arrayCondition = 0;
    header("Location:courses.php");
}
else $arrayCondition = 1;

/*Option*/
$types = $db->prepare("SELECT * FROM `teachers_types`");
$types->execute();
$teachers = $types->fetchAll(PDO::FETCH_ASSOC);

/*Filter*/
    $arBinds = [];
    $prevData = [];
    $array2 = [];
    $changeView = false;
    $sql2 = "SELECT `course-id`, img_path, name, `type-id`, `type-name`, program, cost FROM `courses` INNER JOIN `teachers_types` ON `type-id` = `id-teacher-type`";
if(!array_key_exists('clearFilter', $_GET)){
    if(count($_GET) > 0){
        foreach($_GET as $item){
            if($item){
                $changeView = true;
                break;
            }
        }
        if($changeView == false) {$arrayCondition = 1; header("Location: courses.php");}
        $prevData = $_GET;
        $sql2 .= " WHERE ";
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
            $arBinds['program'] = htmlspecialchars("".$str . $_GET['program'] . $str."");
        }
        if($_GET['teacher']){
            if($isAnd) $sql2 .= " AND ";
            $sql2 .= "teachers_types.`type-id` = :teacher";
            $arBinds['teacher'] = htmlspecialchars($_GET['teacher']);
        }
        $sql2 .= ";";
        $stmt = $db->prepare($sql2);
        $result = $stmt->execute($arBinds);
        $array2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!count($array2))
            $arrayCondition = -1;    
        else $arrayCondition = 2;
    }
}
else header('Location: courses.php');

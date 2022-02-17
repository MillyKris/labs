<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');

$fields = courseActions::fillEdit($_GET['data-id-item']);
$message = courseActions::getMessage();

?>


<div class="container text-center" style = "margin-top:70px;margin-bottom:50px">
	<h1>Редактировать</h1>
                <form action = "" method = "post" class = "form col"enctype="multipart/form-data">
                <p style = "color:red"><?php if(isset($message) && strlen($message) > 0){  echo $message; $message = "";} else if(isset($_POST)) echo "Запись успешно изменена"?></p>
                <input type="hidden" name="id" value="<?=$_GET['data-id-item']?>" />
                <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($fields['name']) ? htmlspecialchars($fields['name']) : '' ?>">
                <select name = "teacher" class = "form-control">
                     <option value="<?=$fields['id-teacher-type']?>" <?php if(!isset($_POST['teacher'])) echo "selected"?>>
                        <?php 
                        $name = teachersTable::getById($fields['id-teacher-type']);
                        print($name[0]['type-name']);
                         ?>
                        </option>  
                     <?php
                     if(gettype($typesTeachers) == 'array')
                            foreach($typesTeachers as $item): ?>
                                <option value="<?php echo $item['type-id']?>"<?php if(isset($_POST['teacher']) && $item['type-id'] == $_POST['teacher']) echo "selected"?>> <?php echo $item['type-name'] ?></option>';
                     <?php endforeach ?>
                </select>

                <input type="text" name="program" placeholder = "Программа" class = "form-control" required value="<?=isset($fields['program']) ? htmlspecialchars($fields['program']) : '' ?>">
                <input type="number" name="cost" placeholder = "Стоимость" class = "form-control" required value="<?=isset($fields['cost']) ? htmlspecialchars($fields['cost']) : '' ?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
                <input type="file" class="form-control" name ="image" title="Фото">
                <button class = "btn btn-success" type = "submit">Изменить</button>
              </form>
        </div>



<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/footer.php');
?>
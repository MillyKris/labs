<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');

$message = courseActions::getMessage();

?>

<div class="container text-center" style = "margin-top:70px;">
	<h1>Добавить курс</h1>
        		<form action = "" method = "post" class = "form col"enctype="multipart/form-data">
		        <p style="color: red"><?php if(isset($message) && strlen($message) > 0){  echo $message; $message = "";}?></p>
		        <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
               
		        <select name = "teacher" class = "form-control">
                     <option value="0" <?php if(!isset($_POST['teacher'])) echo "selected"?>>Преподаватель:</option>  
                     <?php

                     if(gettype($typesTeachers) == 'array')
                            foreach($typesTeachers as $item): ?>
                                <option value="<?php echo $item['type-id']?>"<?php if(isset($_POST['teacher']) && $item['type-id'] == $_POST['teacher']) echo "selected"?>> <?php echo $item['type-name'] ?></option>';
                     <?php endforeach ?>
                </select>

                <input type="text" name="program" placeholder = "Программа" class = "form-control" required value="<?=isset($_POST['program']) ? htmlspecialchars($_POST['program']) : '' ?>">
                <input type="number" name="cost" placeholder = "Стоимость" class = "form-control" required value="<?=isset($_POST['cost']) ? htmlspecialchars($_POST['cost']) : '' ?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <input type="file" class="form-control" name ="image" title="Фото" required>
		        <button class = "btn btn-success" type = "submit">Добавить</button>
		      </form>
        </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/footer.php'); ?>

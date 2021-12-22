<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/header.php'); 
      require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/actions.php');
?>
<?php /*echo "<br><br><br>";var_dump($_POST);
var_dump($_FILES)*/?>
        <div class="container text-center" style = "margin-top:150px;">
        		<form action = "add.php" method = "post" class = "form col"enctype="multipart/form-data">
		        <p><?php if(isset($message)){  echo $message; $message = "";}?></p>
		        <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($_POST['name']) ? htmlspecialchars($_POST['name']) : '' ?>">
		        <select name = "teacher" class = "form-control">
                     <option value="0" selected>Преподаватель:</option>  
                     <?php
                     if(gettype($typesTeachers) == 'array')
                            foreach($typesTeachers as $item): ?>
                                <option value="<?php echo $item['type-id']?>"> <?php echo $item['type-name'] ?></option>';
                     <?php endforeach ?>
                </select>

                <input type="text" name="program" placeholder = "Программа" class = "form-control" required value="<?=isset($_POST['program']) ? htmlspecialchars($_POST['program']) : '' ?>">
                <input type="number" name="cost" placeholder = "Стоимость" class = "form-control" required value="<?=isset($_POST['cost']) ? htmlspecialchars($_POST['cost']) : '' ?>">
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <input type="file" class="form-control" name ="image" title="Фото" required>
		        <button class = "btn btn-success" type = "submit">Добавить</button>
		      </form>
        </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/footer.php'); ?>

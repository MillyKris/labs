<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L6/templates/header.php'); ?>

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

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
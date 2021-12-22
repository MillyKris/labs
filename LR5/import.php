<?php 
require_once("logic.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header.php'); 
import($db);
?>

<div class="container text-center" style = "margin-top:150px;">
        		<form action = "" method = "post" class = "form col"enctype="multipart/form-data">
		        <h3>Импорт CSV файла пользователя</h3>
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <input type="file" class="form-control" name ="import" title="Фото" required>
		        <button class = "btn btn-success" type = "submit">Импорт</button>
		      </form>
		      <p style = "font-size:1.5em; color:red"><?php
		      
			      if(strlen($message) > 0)
			       	echo $message;
			      else if(isset($_FILES['import'])) echo "Файл с данными получен из пользовательского файла и обработан. Создана таблица courses_imported (число записей: ".$countRecords.")";
		   	  ?></p>
</div>

<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/footer.php'); 
?>
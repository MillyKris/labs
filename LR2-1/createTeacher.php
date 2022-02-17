<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');

$message = teachersActions::getMessage();

?>

<div class="container text-center" style = "margin-top:70px;">
	<h1>Добавить преподавателя</h1>
        		<form action = "" method = "post" class = "form col"enctype="multipart/form-data">
		        <p style="color: red"><?php if(isset($message) && strlen($message) > 0){  echo $message; $message = "";}?></p>
		        <input type="text" name="type" placeholder = "Название" class = "form-control" required value="<?=isset($_POST['type']) ? htmlspecialchars($_POST['type']) : '' ?>">
		        <button class = "btn btn-success" type = "submit">Добавить</button>
		      </form>
        </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/footer.php'); ?>

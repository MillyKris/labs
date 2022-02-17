<?php 

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');

$fields = teachersActions::fillEdit($_GET['data-id-item']);
$message = teachersActions::getMessage();

?>


<div class="container text-center" style = "margin-top:70px;margin-bottom:50px">
	<h1>Редактировать</h1>
                <form action = "" method = "post" class = "form col"enctype="multipart/form-data">
                <p style = "color:red"><?php if(isset($message) && strlen($message) > 0){  echo $message; $message = "";}?></p>
                <input type="hidden" name="id" value="<?=$_GET['data-id-item']?>" />
                <input type="text" name="type-name" placeholder = "Название" class = "form-control" required value="<?=isset($fields['type-name']) ? htmlspecialchars($fields['type-name']) : '' ?>">
                
                <button class = "btn btn-success" type = "submit">Изменить</button>
              </form>
        </div>



<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/footer.php');
?>
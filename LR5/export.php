<?php 
require_once("logic.php");
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/header.php'); 

$link = "<a class = 'btn btn-success' type = 'button' style = 'margin-top:50px;' href='".export($db)."' download='courses_exported.csv'>".(null == (export($db))? "Скачать" : "Ссылка недоступна")."</a>";
?>
<div class="container" style = "padding-top:50px;">
	<form class = "form" method = "GET" action = "logic.php">
		<h2>CSV файл на скачивание</h2>
		<?php echo $link?>
	</form>
</div>

<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR5/templates/footer.php'); 
?>
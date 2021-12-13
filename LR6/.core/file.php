<?php 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<form action = "file.php" method = "post" class = "form col"enctype="multipart/form-data">
		        <p><?php if(isset($message)){  echo $message; $message
		         = "";}?></p>
                <input type="hidden" name="MAX_FILE_SIZE" value="300000" />
			    <p><input type="file" class="form-control" name ="image" title="Фото" required></p>
		        <p><button class = "btn btn-success" type = "submit">Добавить</button></p>
		      </form>
</body>
</html>

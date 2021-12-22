<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/header.php'); 
      require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/actions.php');

$fields = fillEdit($_GET['data-id-item']);
?>

        <div class="container text-center" style = "margin-top:150px;">
                <form action = "" method = "post" class = "form col"enctype="multipart/form-data">
                <p><?php if(isset($message)){  echo $message; $message = "";}?></p>
                <input type="hidden" name="id" value="<?=$_GET['data-id-item']?>" />
                <input type="text" name="name" placeholder = "Название" class = "form-control" required value="<?=isset($fields['name']) ? htmlspecialchars($fields['name']) : '' ?>">
                <select name = "teacher" class = "form-control">
                     <option value="<?=$fields['id-teacher-type']?>" selected>Преподаватель</option>  
                     <?php
                     if(gettype($typesTeachers) == 'array')
                            foreach($typesTeachers as $item): ?>
                                <option value="<?php echo $item['type-id']?>"> <?php echo $item['type-name'] ?></option>';
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
//var_dump($_POST);
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/footer.php'); ?>

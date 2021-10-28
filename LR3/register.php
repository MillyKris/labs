<?php
  //session_start();
  require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/session.php');
?>

<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <style>
      body{
        display: flex;
        justify-content: center;
      }
      .msg{
        background: darkcyan;
        color: #fff;
        text-align: center;
      }
      input{
        height: 20px;
        padding: 5px 10px;
      }
      input:last-child{
        margin-bottom: 10px;
      }
      .but{
        margin-top: 15px;
      }
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!--Регистрация-->
    <form action = "register.php" method = "post" class = "form">
        <p>
          <?php 
            if($message != "") echo $message; $message = "";
          ?>
        </p>
        <label>Электронная почта</label>
        <input type="text" name="email" class = "form-control"required value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>">
        <label>Пароль</label>
        <input type="password" name="password" placeholder = "Введите пароль" class = "form-control"required>
        <label>Подтвердите пароль</label>
        <input type="password" name="password2" placeholder = "Подтвердить пароль" class = "form-control"required>
        <label>ФИО</label>
        <input type="text" name="fullName" placeholder = "Введите ФИО" class = "form-control" required value="<?=isset($_POST['fullName']) ? htmlspecialchars($_POST['fullName']) : '' ?>">
        <label>Дата рождения</label>
        <input type="date" name="dateOfBirth" placeholder = "Введите дату рождения" class = "form-control" required value="<?=isset($_POST['dateOfBirth']) ? $_POST['dateOfBirth'] : '' ?>">
        <label>Пол</label><br>
        <input type="radio" name="gender" value="f"<?php if(array_key_exists('gender', $_POST)) echo(($_POST['gender'] == 'f') ? "checked" : "")?>>Женский <br>
        <input type="radio" name="gender" value="m"<?php if(array_key_exists('gender', $_POST)) echo($_POST['gender'] == 'm') ? "checked" : ""?>>Мужской <br>
        <label>Ссылка на профиль VK</label>
        <input type="text" name="vk" placeholder = "Введите ссылку" class = "form-control" required value="<?php echo array_key_exists('vk', $_POST) ? htmlspecialchars($_POST['vk']) : '' ?>">
        <label>Адрес</label>
        <input type="text" name="address" placeholder = "Введите адрес" class = "form-control" required value="<?=isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?>">
        <label>Интересы</label>
        <input type="text" name="interests" placeholder = "" class = "form-control" required value="<?=isset($_POST['interests']) ? htmlspecialchars($_POST['interests']) : '' ?>">
        <label>Группа крови</label>
        <select name = "bloodtype" class = "form-control">
            <option value="1" <?php if(array_key_exists('bloodtype', $_POST)) echo($_POST['bloodtype'] == 1) ? "selected" : ""?>>1</option>
            <option value="2" <?php if(array_key_exists('bloodtype', $_POST)) echo($_POST['bloodtype'] == 2) ? "selected" : ""?>>2</option>
            <option value="3" <?php if(array_key_exists('bloodtype', $_POST)) echo($_POST['bloodtype'] == 3) ? "selected" : ""?>>3</option>
            <option value="4" <?php if(array_key_exists('bloodtype', $_POST)) echo($_POST['bloodtype'] == 4) ? "selected" : ""?>>4</option>
        </select>
        <label>Резус-фактор</label><br>
        <input type="radio" name="factor" value="+"<?php if(array_key_exists('factor', $_POST)) echo($_POST['factor'] == '+') ? "checked" : ""?> checked>+<br>
        <input type="radio" name="factor" value="-"<?php if(array_key_exists('factor', $_POST))echo($_POST['factor'] == '+') ? "checked" : ""?>>-<br>
        
        <div class =  "but"><button class = "btn btn-success">Зарегистрироваться</button>
        <a href="authorization.php">Авторизация</a></div>
    </form>














    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
<?php
  //session_start();
  require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/session.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/header.php');
  require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/nav.php');

?>
    <!--Регистрация-->
    <div class="row" style = "margin-top:80px">
        <div class="col"></div>
        <form action = "register.php" method = "post" class = "form col">
            <p style = "background: darkcyan;color: #fff;text-align: center;">
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
            
            <div class =  "but" style = "margin-top: 15px;"><button class = "btn btn-success">Зарегистрироваться</button>
            <a href="authorization.php">Авторизация</a></div>
        </form>
        <div class="col"></div>
    </div>
<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/footer.php');
 ?> 

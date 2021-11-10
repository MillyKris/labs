<?php //session_start();
require_once($_SERVER['DOCUMENT_ROOT'] . '/LR3/session.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/nav.php');

?>
    
    <div class="row" style = "margin-top:50px">
      <div class="col"></div>
      <form action = "authorization.php" method = "post" class = "form col">
        <p><?php echo $message; $message = ""?></p>
        <label>Электронная почта</label>
        <input type="text" name="email" placeholder = "Введите электронную почту" class = "form-control" required value="<?=isset($_POST['email']) ? $_POST['email'] : '' ?>">
        <label>Пароль</label>
        <input type="password" name="password" placeholder = "Введите пароль" class = "form-control" required>
        <button class = "btn btn-success">Войти</button>
        <a href="register.php" style = "color:blue;">Зарегистрироваться</a>
      </form>
      <div class="col"></div>
    </div><!--Авторизация-->
<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/footer.php');
 ?>

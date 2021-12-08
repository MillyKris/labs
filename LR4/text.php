<?php 

    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR4/header.php');
    require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR4/logic1.php');
    
?>
<div class="row" style = "margin-top:50px">
      <div class="col"></div>
      <form action = "" method = "post" class = "form col">
        <textarea  class = "form-control" name = "text" placeholder = "<?php if(array_key_exists('text', $_POST)) echo htmlspecialchars($_POST['text']); else echo htmlspecialchars($html);?>"></textarea>
        <button class = "btn btn-success">Submit</button>
      </form>
      <div class="col"></div>
</div>
<div class="row content" >
   <div class="content">
    <div class="structure">
       <?php 
        echo "<h1>11. Оглавление:</h1>";
        echo $content;
       ?> 
    </div>
        <?php 
        echo "<h1>2. Только картинки:</h1>";
        foreach ($images as $im) {
            echo $im;
        }
        echo "<h1>20. Замена стилей: </h1>";
        echo htmlspecialchars($html);
        echo "<h1>-------------------Страница----------------------</h1>";
        echo $html;
        ?>
    </div> 
</div>

<?php 
 require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR3/footer.php');
 ?>

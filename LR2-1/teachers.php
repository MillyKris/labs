<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php'); 


$result = teachersActions::viewAll();
$message = teachersActions::getMessage();
?>

<div class="container text-center" style = "margin-top:70px;">
	<h1 style = "margin-bottom:60px;">Преподаватели</h1>
            <?php 
                if(strlen($message) > 0):
                    echo "<div style = 'padding: 0 5px;margin: auto; width:310px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 100px;'>".$message."</h2></div>";
                    else:?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope = "col">ID</th>
                                    <th scope = "col">Название</th>
                                    <th scope = "col"></th>
                                    <th scope = "col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(!empty($result))
                                foreach($result as $row):?>
                                    <tr>
                                        <td><?=intval($row['type-id'])?></td>
                                        <td><a href="courses.php?preset=<?=intval($row['type-id'])?>"target = "blank">
                                            <?=htmlspecialchars($row['type-name'])?>
                                        </a></td>
                                        <td>
                                            <a class="btn btn-outline-info"id="<?=$row['type-id']?>" href = "/LR2.1/editTeacher.php?data-id-item=<?=$row['type-id']?>">Редактировать</a>
                                        </td>
                                        <td>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                                             <a class="btn btn-outline-danger delete"id="<?=$row['type-id']?>" href = "/LR2.1/.core/actions.php?data-id-item=<?=-$row['type-id']?>">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>            
                            </tbody>
                        </table>
                    <?php endif;
            ?>
             <a class = "btn btn-lg btn-info" type="button" href="createTeacher.php">Добавить</a>
        </div>
    </div>

<script>
    $(".delete").on("click", function() {
        if(!confirm($(this).html() + "?")) return false;
})
</script>

<?php 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/footer.php');
?>
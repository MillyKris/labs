<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/.core/actions.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . '/LR2.1/templates/header.php');


$result = courseActions::viewAll();
$message = courseActions::getMessage();
?>

<div class="container text-center" style = "margin-top:70px;">
	<h1 style = "margin-bottom:60px;">Список курсов:</h1>
            <?php 

                if(isset($message) && strlen($message) > 0):
                    echo "<div style = 'padding: 0 5px;margin: auto; width:310px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 100px;'>".$message."</h2></div>";
                    else:?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope = "col"></th>
                                    <th scope = "col">Название</th>
                                    <th scope = "col">Преподаватель</th>
                                    <th scope = "col">Программа</th>
                                    <th scope = "col">Цена</th>
                                    <th scope = "col"></th>
                                    <th scope = "col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if(isset($_GET['preset']) && !empty($result)){
                                    foreach($result as $row):
                                        if($row['id-teacher-type'] == $_GET['preset']):
                                    ?>
                                    <tr>
                                        <td><img src="<?=htmlspecialchars($row['img_path'])?>"width = "100"></td>
                                        <td><?=htmlspecialchars($row['name'])?></td>
                                        <td><?php
                                        for($i = 0; $i < count($typesTeachers); $i ++){
                                            if($typesTeachers[$i]['type-id'] == $row['id-teacher-type']){
                                                echo htmlspecialchars($typesTeachers[$i]['type-name']);
                                                break;
                                            }
                                        }
                                        ?></td>
                                        <td><?=htmlspecialchars($row['program'])?></td>
                                        <td><?=htmlspecialchars($row['cost'])?></td>
                                        <td>
                                            <a class="btn btn-outline-info"id="<?=$row['course-id']?>" href = "/LR2.1/editCourse.php?data-id-item=<?=$row['course-id']?>">Редактировать</a>
                                        </td>
                                        <td>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                             <a target="blank" class="btn btn-outline-danger delete"id="<?=$row['course-id']?>" href = "/LR2.1/.core/actions.php?data-id-item=<?=-$row['course-id']?>">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endif; endforeach;
                                }
                                else if(!empty($result)){
                                foreach($result as $row):?>
                                    <tr>
                                        <td><img src="<?=htmlspecialchars($row['img_path'])?>"width = "100"></td>
                                        <td><?=htmlspecialchars($row['name'])?></td>
                                        <td><?php
                                        for($i = 0; $i < count($typesTeachers); $i ++){
                                            if($typesTeachers[$i]['type-id'] == $row['id-teacher-type']){
                                                echo htmlspecialchars($typesTeachers[$i]['type-name']);
                                                break;
                                            }
                                        }
                                        ?></td>
                                        <td><?=htmlspecialchars($row['program'])?></td>
                                        <td><?=htmlspecialchars($row['cost'])?></td>
                                        <td>
                                            <a class="btn btn-outline-info"id="<?=$row['course-id']?>" href = "/LR2.1/editCourse.php?data-id-item=<?=$row['course-id']?>">Редактировать</a>
                                        </td>
                                        <td>
                                            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                             <a target="blank" class="btn btn-outline-danger delete"id="<?=$row['course-id']?>" href = "/LR2.1/.core/actions.php?data-id-item=<?=-$row['course-id']?>">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endforeach;}?>            
                            </tbody>
                        </table>
                    <?php endif;
            ?>
             <a class = "btn btn-lg btn-info" type="button" href="<?php if(isset($_GET['preset'])) echo '#'; else echo 'createCourse.php'?>" >Добавить</a>
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
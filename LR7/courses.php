<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/header.php');
      require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/.core/actions.php'); 
?>
        <div class="container text-center" style = "margin-top:150px;">
            <?php 
            if(isset($_GET['success'])){
                        if($_GET['success'] == 1) echo "<h2>Запись успешно удалена</h2>";
                        else echo "<h2>Не удалось удалить запись</h2>";
            }
                if(strlen($message) > 0):
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
                                <?php if(!empty($result))
                                foreach($result as $row):?>
                                    <tr>
                                        <td><img src="<?=$row['img_path']?>"width = "100"></td>
                                        <td><?=$row['name']?></td>
                                        <td><?php
                                        for($i = 0; $i < count($typesTeachers); $i ++){
                                            if($typesTeachers[$i]['type-id'] == $row['id-teacher-type']){
                                                echo $typesTeachers[$i]['type-name'];
                                                break;
                                            }
                                        }
                                        ?></td>
                                        <td><?=$row['program']?></td>
                                        <td><?=$row['cost']?></td>
                                        <td>
                                            <!--<button type = "submit" name = "edit" class = "btn btn-sm btn-outline-info" disabled>Редактировать</button>-->
                                            <a class="btn btn-outline-info delete"id="<?=$row['course-id']?>" href = "/L7/edit.php?data-id-item=<?=$row['course-id']?>">Редактировать</a>
                                        </td>
                                        <td>
                                             <!--<button type = "submit" name = "delete" class = "btn btn-sm btn-outline-danger" disabled>Удалить</button>-->
                                             <a class="btn btn-outline-danger delete"id="<?=$row['course-id']?>" href = "/L7/.core/delete.php?data-id-item=<?=$row['course-id']?>">Удалить</a>
                                        </td>
                                    </tr>
                                <?php endforeach;?>            
                            </tbody>
                        </table>
                    <?php endif;
            ?>
             <a class = "btn btn-lg btn-info" type="button" href="add.php">Добавить</a>
        </div>
    </div>

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L7/templates/footer.php'); ?>

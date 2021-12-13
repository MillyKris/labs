<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L6/templates/header.php'); ?>
        <div class="container text-center" style = "margin-top:150px;">
            <?php 
            
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
                                        //=$$row['type-name']?></td>
                                        <td><?=$row['program']?></td>
                                        <td><?=$row['cost']?></td>
                                        <td>
                                            <button type = "submit" name = "edit" class = "btn btn-sm btn-outline-info" disabled>Редактировать</button>
                                        </td>
                                        <td>
                                             <button type = "submit" name = "delete" class = "btn btn-sm btn-outline-danger" disabled>Удалить</button>
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

<?php require_once ($_SERVER['DOCUMENT_ROOT'] . '/L6/templates/footer.php'); ?>

<?php
require_once 'logic.php';
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Список курсов | Coursera</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <?php
            include "nav.php";
        ?>
    </nav>

    <div class="content" style = "padding-top:150px;">
        <div class="filter">
            <form class = "form" method = "GET" action = "courses.php">
                <h3>Фильтрация</h3>
                <p>По названию:</p>
                    <input type="text" name="courseName" class = "form-control" placeholder = "Введите название курса:" value = "<?php if(array_key_exists('courseName', $prevData)) echo $prevData['courseName']; ?>">
                <p>По цене</p>
                    <input type="number" name="costFrom" class = "form-control" placeholder = "Цена от:" value = "<?php if(array_key_exists('costFrom', $prevData)) echo $prevData['costFrom']; ?>">
                    <input type="number" name="costTo" class = "form-control" placeholder = "Цена до:" value = "<?php if(array_key_exists('costTo', $prevData)) echo $prevData['costTo']; ?>">
                <p>По программе</p>
                    <input type="text" name="program" class = "form-control" placeholder = "Введите описание программы" value = "<?php if(array_key_exists('program', $prevData)) echo $prevData['program']; ?>">
                <p>По преподавателю</p>
                    <select name = "teacher" class = "form-control">
                        <option value="" selected>Выберите преподавателя:</option>
                        <?php
                            foreach($teachers as $iten): ?>
                                <option value="<?php echo $iten['type-id']?>"> <?php echo $iten['type-name'] ?></option>';
                        <?php endforeach ?>
                    </select>
                <button type = "submit" name = "Filter" class = "btn btn-lg btn-outline-success mt-5 mr-2">Apply</button>
                <button type = "submit" name = "clearFilter" class = "btn mt-5 btn-outline-danger">Reset</button>
            </form>
        </div>
        

        <div class="container text-center">
            <?php 
                switch($arrayCondition){
                    case 0:
                    echo "<div style = 'padding: 0 5px;margin: auto; width:310px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 100px;'>Ничего не найдено </h2></div>";
                    break;
                    case 1:?>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope = "col"></th>
                                    <th scope = "col">Название</th>
                                    <th scope = "col">Преподаватель</th>
                                    <th scope = "col">Программа</th>
                                    <th scope = "col">Цена</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($array as $row):?>
                                    <tr>
                                        <td><img src="<?=$row['img_path']?>"></td>
                                        <td><?=$row['name']?></td>
                                        <td><?=$row['type-name']?></td>
                                        <td><?=$row['program']?></td>
                                        <td><?=$row['cost']?></td>
                                    </tr>
                                <?php endforeach;?>            
                            </tbody>
                        </table>
                    <?php break;
                    default:echo "<div style = 'padding: 0 5px;margin: auto; width:310px; height:100px;background:rgba(255, 0, 0, 0.4);'><h2 style = 'line-height: 100px;'>Switch error </h2></div>";}
            ?>
            
        </div>
    </div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>

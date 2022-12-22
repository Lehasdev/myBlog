<?php
include "../../app/controllers/topics.php";


?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>

    <script src="https://kit.fontawesome.com/0fe154bbb6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
<?php include ('../../app/include/admin_header.php');?>
<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php";?>
        <div class="post_admin col-9">
            <div class="button row">
                <a href="createT.php" class="col-3 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление</a>
            </div>

            <div class="row title-label">
                <h2>Создать категорию</h2>
                <div class="err">
                    <p><?php include '../../app/helps/errorInfo.php';?></p>
                </div>
                <div class="row  add-cat">
                   <form  method="post" action="createT.php">
                       <div class="w-100"></div>
                       <div class="col">
                           <input type="text" class="form-control" value="<?=$name;?>" name="name" placeholder="Название категории" aria-label="Название категории">
                       </div>
                       <div class="w-100"></div>
                       <div class="col">
                           <lable for="content" class="form-label">Описание категории</lable>
                           <textarea class="form-control" name="descriptions" id="content" rows="3"><?=$description;?></textarea>
                       </div>
                       <div class="w-100"></div>
                       <button type="submit" name="t_btn" class="btn btn-primary" >Создать категорию</button></form>
                   </form>


                </div>

            </div>


        </div>



    </div>




</div>

<!--Блок footer start-->
<?php include('../../app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

</body>
</html>



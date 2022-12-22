<?php
include('../../app/controllers/users.php');

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
                <a href="create.php" class="col-3 btn btn-success">Создать</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление</a>
            </div>

            <div class="row title-label">
                <h2>Создание пользователя</h2>
                <div class="err">
                    <p><?php include '../../app/helps/errorInfo.php';?></p>
                </div>
                <div class="row  g-0 add-user">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <div class="w-100"></div>
                    <div class="col-6">
                        <label for="formGroupExampleInput" class="form-label">Логин</label>
                        <input type="text" class="form-control" name="login" id="formGroupExampleInput" placeholder="введите ваш логин">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш Email">

                    </div>
                    <div class="w-100"></div>
                    <div class="col-6">
                        <label for="exampleInputPassword1" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="pas" id="exampleInputPassword1" placeholder="введите пароль">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6">
                        <label for="exampleInputPassword2" class="form-label">Пароль</label>
                        <input type="password" class="form-control" name="sec_pas" id="exampleInputPassword2" placeholder="повторно введите пароль">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-6">
                        <div class="form-check">
                            <input name="admin" value="1" class="form-check-input" type="checkbox" id="flex-Check-Checked">
                            <label class="form-check-label" for="flex-Check-Checked">Admin</label>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <button name="create-user" class="btn btn-primary" type="submit">Создать пользователя</button>
                    </div>
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



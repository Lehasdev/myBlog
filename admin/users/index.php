<?php
include"../../app/controllers/users.php";
$users=selectAll('users');
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
                <a href="create.php" class="col-3 btn btn-success">Добавить пользователя</a>
                <span class="col-1"></span>
                <a href="index.php" class="col-3 btn btn-warning">Управление пользователями</a>
            </div>

            <div class="row title-label">
                <h2>Управление пользователями</h2>
                <div class="err">
                    <p><?php include '../../app/helps/errorInfo.php';?></p>
                </div>
                <div class="id col-1">ID</div>
                <div class="title col-5">Логин</div>
                <div class="author col-2">Роль</div>
                <div class="red col-4">Управление</div>
            </div>
            <?php foreach ($users as $key=>$user):?>
            <div class="row post">
                <div class="id col-1"><?=$user['id'];?></div>
                <div class="title col-5"><?=$user['username'];?></div>
                <?php if($user['admin']==1):?>
                <div class="author col-2">Admin</div>
                <?php elseif($user['admin']==0):?>
                <div class="author col-2">User</div>
                <?php endif;?>
                <div class="red col-2"><a href="edit.php?edit_id=<?=$user['id'];?>">edit</a></div>
                <div class="del col-2"><a href="edit.php?del_id=<?=$user['id'];?>">delete</a></div>
            </div>
            <?php endforeach;?>


        </div>

    </div>
</div>

<!--Блок footer start-->
<?php include('../../app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>


<?php

include "../../app/controllers/com_control.php";

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

            <div class="row title-label">
                <h2>Управление комментариями</h2>
                <div class="err">
                    <p><?php include '../../app/helps/errorInfo.php';?></p>
                </div>
                <div class="id col-1">ID</div>
                <div class="title col-3">Комментарий</div>
                <div class="author col-4">Автор</div>
                <div class="red col-2">Управление</div>
            </div>
            <?php foreach ($allComments as $key => $comment):?>
            <div class="row post">
                <div class="id col-1"><?=$comment['id']?></div>
                <div class="title col-3"><?=$comment['comment']?></div>
                <?php $user=explode('@', $comment['email']);
                      $user=$user[0].'@';?>

                <div class="author col-2"><?=$user?></div>
                <div class="red col-2"><a href="edit.php?id=<?=$comment['id'];?>">edit</a></div>
                <div class="del col-2"><a href="edit.php?delete_id=<?=$comment['id'];?>">delete</a></div>
                <?php if($comment['stat']):?>
                    <div class="status col-2"><a href="edit.php?publish=0&pub=<?=$comment['id'];?>"> в черновик</a></div>
                <?php else:?>
                    <div class="status col-2"><a href="edit.php?publish=1&pub=<?=$comment['id'];?>">опубликовать</a></div>
                <?endif;?>
            </div>
            <?endforeach;?>

        </div>

    </div>
</div>

<!--Блок footer start-->
<?php include('../../app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>

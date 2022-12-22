<?    include_once $_SERVER['DOCUMENT_ROOT'] . '/app/controllers/com_control.php';
      include_once 'app/controllers/users.php';
      $id=$_GET['page'];
      $post= selectPostFromPostWithUsersOnSingle('posts','users',$id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>

    <script src="https://kit.fontawesome.com/0fe154bbb6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
<?php include('app/include/header.php');?>
<!--Блок main start-->
<div class="container">
    <div class="content row">
        <!-- Блок Main Content-->
        <div class="main-content col-md-9 col-12">
            <h2><?=$post['title'];?></h2>
            <div class="err">
                <p><?php include 'app/helps/errorInfo.php';?></p>
            </div>
            <div class="post row g-0">
                <div class="img_2 col-12">
                    <img src=<?=BASE_PATH.'assets/imeges/post/'. $post['img'];?> alt="<?=$post['img'];?>" class="img-thumbnail">

                </div>
                <div class="single_post_text col-12">
                    <h3>
                        <a href="/"></a>
                    </h3>
                    <i class="far fa-user">  <?=$post['username'];?></i>
                    <i class="far fa-calendar">  <?=$post['create_date'];?></i>
                    <p class="prev"><?=$post['content'];?></p>

                </div>
                <?php include "app/include/comments.php";?>
            </div>
        </div>

        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Что ищем?">
                </form>
            </div>


            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <li><a href="/">Программирование</a> </li>
                    <li><a href="/">Дизайн</a> </li>
                    <li><a href="/">Визуализация</a> </li>
                    <li><a href="/">Кейсы</a> </li>
                    <li><a href="/">Мотивация</a> </li>


                </ul>
            </div>
        </div>
    </div>
</div>
    <!--Блок main end-->
    <!--Блок footer start-->
<?php include ('app/include/footer.php');?>
    <!--Блок footer end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 </body>
</html>
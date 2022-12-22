<?php
        include 'app/controllers/topics.php';
//        $posts=selectAll('posts',['status'=>1]);

        $page= $_GET['pg']?? 1;
        $total_pages= contRows('posts');
        $limit=6;

        $last=ceil($total_pages/$limit);
        $offset=$limit*($page-1);
        $posts=selectAllFromPostWithUsersOnIndex('posts','users',$limit,$offset);
        $top= selectAllFromTopTopicOnIndex('posts');

        ?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
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
<?php include ('app/include/header.php');?>
<!--Блок карусели start-->

<div class="container">
    <div class="row">
        <h2 class="slider-title">Топ Публикации</h2>
    </div>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

      <div class="carousel-inner">
          <?php foreach ($top as $key=>$post):?>
          <?php if($key==0):?>
              <div class="carousel-item active">
                  <?php else:?>
                    <div class="carousel-item">
              <?php endif;?>
            <img src=<?=BASE_PATH.'assets/imeges/post/'. $post['img'];?> alt="<?=$post['img'];?>">
            <div class="carousel-caption d-none d-md-block">
                <h5><a href="single_page.php?page=<?= $post['id'];?>"><?= mb_substr($post['title'],0,30,'UTF-8');?></a></h5>
            </div>

        </div>
                  <?php endforeach;?>



    </div>


    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
</div>

<!--Блок карусели end-->
<!--Блок main start-->
<div class="container">
    <div class="content row">
        <!-- Блок Main Content-->
        <div class="main-content col-md-9 col-12">
           <h2>Последние публикации</h2>
           <?php foreach ($posts as $key=>$post):?>
            <div class="post row">
                <div class="img col-12 col-md-4">
                    <img src= <?=BASE_PATH.'assets/imeges/post/'. $post['img'];?> alt="<?=$post['img'];?>" class="img-thumbnail">

                </div>
                <div class="post_text col-12 col-md-8">
                    <h3>
                        <a href="single_page.php?page=<?=$post['id'];?>"><?=mb_substr($post['title'],0,30,'UTF-8');?></a>
                    </h3>
                    <i class="far fa-user"> <?=$post['username'];?> </i>
                    <i class="far fa-calendar"> <?=$post['create_date'];?></i>
                    <p class="preview-text"><?= implode("\n",str_split(mb_substr($post['content'],0,300,'UTF-8'),110));?></p>

                </div>

            </div>
            <?php endforeach;?>
            <?php include "app/include/pagination.php";?>
        </div>

        <div class="sidebar col-md-3 col-12">
            <div class="section search">
                <h3>Поиск</h3>
                <form action="search.php" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Что ищем?">
                </form>
            </div>


            <div class="section topics">
                <h3>Категории</h3>
                <ul>
                    <?php foreach ($topics as $key=>$topic):?>
                    <li><a href="category.php?id_cg=<?=$topic['id'];?>"><?=$topic['name']?></a> </li>
                    <?php endforeach;?>
                </ul>

            </div>

   </div>

</div>
</div>
<!--Блок main end-->
<!--Блок footer start-->
<?php include('app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
 </body>
</html>
<?

    include 'app/controllers/users.php';
?>
<!doctype html>
<html lang="ru">
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
<?php include ('app/include/header.php');
?>
<!--Блок aut_form start-->
<div class="container reg_form">
    <form class="row justify-content-center" method="post" action="aut_form.php">
        <h2 class="col-12">Авторизация</h2>
        <div class="err col-3">
            <p><?php include 'app/helps/errorInfo.php';?></p>
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="formGroupExampleInput" class="form-label">Ваш Email</label>
            <input type="email" class="form-control" value="<?=$email;?>" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="введите ваш Email">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <label for="exampleInputPassword1" class="form-label">Пароль</label>
            <input type="password" class="form-control" name="pas" id="exampleInputPassword1" placeholder="введите ваш пароль">
        </div>
        <div class="w-100"></div>
        <div class="mb-3 col-12 col-md-4">
            <button type="submit" name="btn_log" class="btn btn-secondary">Войти</button>
            <a href="<?php echo BASE_PATH .'reg_form.php';?>">Зарегистрироваться</a>
        </div>


    </form>
</div>
<!--Блок reg_form end-->
<!--Блок footer start-->
<?php include ('app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>
<!--<button type="submit" name="btn_log" class="btn btn-secondary">Войти</button>-->
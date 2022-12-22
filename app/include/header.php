

<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class= "col-4">
                <h1><a href="<?php echo BASE_PATH;?>">My blog</a></h1>
            </div>

            <nav class="col-8">
                <ul>
                    <li><a href="<?php echo BASE_PATH;?>">Главная</a></li>
                    <li><a href="#">О нас</a></li>
                    <li><a href="#">Услуги</a></li>
                    <li>
                        <?php if(isset($_SESSION['id'])):?>
                        <a href="#">
                            <i class="fa-solid fa-user-large"></i>
                            <?php echo $_SESSION['login'];?>
                        </a>
                        <ul>
                            <?php if(!empty($_SESSION['admin'])):?>
                            <li><a href="<?php echo BASE_PATH . 'admin/posts/index.php'?>">Админ панель</a></li>
                            <?php endif;?>
                            <li><a href="<?php echo BASE_PATH .'logout.php'?>">Выход</a></li>
                        </ul>
                        <?php else:?>
                        <a href="<?php echo BASE_PATH .'aut_form.php';?>">  <i class="fa-solid fa-user-large"></i>Войти</a>
                            <ul>
                                <li><a href="<?php echo BASE_PATH . 'reg_form.php';?>">Регистрация</a></li>
                            </ul>
                        <?php endif;?>

                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>

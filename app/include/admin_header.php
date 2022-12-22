
<header class="container-fluid">
    <div class="container">
        <div class="row">
            <div class= "col-4">
                <h1><a href="<?php echo BASE_PATH;?>">My blog</a></h1>
            </div>

            <nav class="col-8">
                <ul>
                    <li>
                        <a href="#" class="adm">
                            <i class="fa-solid fa-user-large"></i>
                            <?php echo $_SESSION['login'];?>
                        </a>

                    <li>
                        <a href="<?php echo BASE_PATH .'logout.php'?>" class="adm">
                            Выход
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
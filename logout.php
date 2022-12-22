<?php
include 'app/database/db.php';
include('path.php');

unset($_SESSION['id']);
unset($_SESSION['login']);
unset($_SESSION['email']);

header('location:'. BASE_PATH);

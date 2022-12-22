<?php
include_once $_SERVER['DOCUMENT_ROOT']."/path.php";
include_once SITE_ROOT ."/app/database/db.php";




$errMsg=[];
//общая функция для создания сессии и соответсвующего редиректа
function userAuth($mas){
    $_SESSION['id']= $mas['id'];
    $_SESSION['login']=$mas['username'];
    $_SESSION['email']=$mas['email'];
    $_SESSION['admin']=$mas['admin'];
    if($_SESSION['admin']){
        header('location:'.BASE_PATH. 'admin/posts/index.php');
    }else{
        header('location:'.BASE_PATH);
    }
}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['btn_reg'])){
    $login=trim($_POST['login']);
    $pasFirst=trim($_POST['pas']);
    $pasTwo=trim($_POST['sec_pas']);
    $email=trim($_POST['email']);
    $admin=0;
    if($login===''||$pasFirst===''||$pasTwo===''||$email===''){
        array_push($errMsg,'Заполните все поля');
    }elseif (mb_strlen($login,'UTF-8')<=2){
        array_push($errMsg,'Логин не может быть короче 2х символов');
    }elseif ($pasFirst!==$pasTwo){
        array_push($errMsg,'Пароли не совпадают');
    }else{
        $existence= selectOne('users',['email'=>$email]);
          if(!empty($existence['email'])&& $existence['email']===$email){
              array_push($errMsg,'Пользователь с такой почтой уже зарегистрирован');
          }else{
             $pas=password_hash($pasFirst,PASSWORD_DEFAULT);
             $post=[
                 'admin'=>$admin,
                 'username'=>$login,
                 'email'=>$email,
                 'password'=>$pas
             ];

        $id= insert_to('users',$post);
        $user= selectOne('users',['id'=>$id]);
        userAuth($user);

    }

    }
} else{
    $login="";
    $email="";
}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['btn_log'])){
    $email=trim($_POST['email']);
    $pas=trim($_POST['pas']);
    if($email===''||$pas===''){
        array_push($errMsg,'Заполните все поля');
      } else {
        $existence = selectOne('users', ['email' => $email]);
        if ($existence && password_verify($pas, $existence['password'])) {
            userAuth($existence);
        } else {
            array_push($errMsg, 'Почта или пароль введены неверно');

        }
    }
}
//Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['create-user'])){
    $admin=0;
    $login= ($_POST['login']);
    $pasFirst= trim($_POST['pas']);
    $pasTwo= trim($_POST['sec_pas']);
    $email= trim($_POST['email']);

    if ($login===''||$pasFirst===''||$pasTwo===''||$email===''){
        array_push($errMsg,'Заполните все поля');
    }elseif (mb_strlen($login,'UTF-8')<=2){
        array_push($errMsg,'Логин не может быть короче 2х символов');
    }elseif ($pasFirst!==$pasTwo){
        array_push($errMsg,'Пароли не совпадают');
    }else{
        $existence= selectOne('users',['email'=>$email]);
        if(!empty($existence['email'])&& $existence['email']===$email){
            array_push($errMsg,'Пользователь с такой почтой уже зарегистрирован');
        }else{
            $pas=password_hash($pasFirst,PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin=1;
            $user=[
                'admin'=>$admin,
                'username'=>$login,
                'email'=>$email,
                'password'=>$pas
            ];

            $id= insert_to('users',$user);
            $user= selectOne('users',['id'=>$id]);
            array_push($errMsg,'Пользователь успешно зарегистрирован');

        }

    }
} else{
    $login="";
    $email="";
}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['del_id'])){


    $id=$_GET['del_id'];
    delete('users',$id);
    header('location:' . BASE_PATH . 'admin/users/index.php');
}
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['edit_id'])){
    $user=selectOne('users',['id'=>$_GET['edit_id']]);
    $id=$user['id'];
    $admin=$user['admin'];
    $username= $user['username'];
    $mail=$user['email'];



}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['up-user'])){
    $username= trim($_POST['login']);
    $mail=trim($_POST['email']);
    $pasFirst= trim($_POST['pas']);
    $pasTwo= trim($_POST['sec_pas']);
    $admin=0;
    $id=$_POST['id'];

    if ($login===''||$pasFirst===''||$pasTwo===''){
        array_push($errMsg,'Заполните все поля');
    }elseif (mb_strlen($login,'UTF-8')<=2){
        array_push($errMsg,'Логин не может быть короче 2х символов');
    }elseif ($pasFirst!==$pasTwo){
        array_push($errMsg,'Пароли не совпадают');

        }else{
            $pas=password_hash($pasFirst,PASSWORD_DEFAULT);
            if (isset($_POST['admin'])) $admin=1;
            $user=[
                'admin'=>$admin,
                'username'=>$login,
                'password'=>$pas
            ];

            update('users',$user,$id);
        header('location:'.BASE_PATH. 'admin/users/index.php');


    }}


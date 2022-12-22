<?php
include "../../path.php";
include SITE_ROOT ."/app/database/db.php";


$errMsg=[];
$topics=selectAll('topics');
$posts=selectAll('posts');
$postsAdm=selectAllFromPostWithUsers('posts','users');
$id='';
$title='';
$content='';
$topic='';
$img='';
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['add_post'])){

    if(!empty($_FILES['img']['name'])) {
        $imgName = $_FILES['img']['name'];
        $timNam= time();
        $imgTmpName = $_FILES['img']['tmp_name'];
        $destination= ROOT_PATH . "\assets\imeges\post\\" .$timNam. $imgName;
        $fileType=$_FILES['img']['type'];
        $size=$_FILES['img']['size'];
           if(strpos($fileType, 'image')===false) {
               array_push($errMsg,'');

              }elseif($size>900000){
               array_push($errMsg,'Размер файла превышает допустимую норму');
           }else {
               $result = move_uploaded_file($imgTmpName,$destination);
                  if($result){
                    $_POST['img']=$imgName;
                  }else {
                      array_push($errMsg,'Ошибка загрузки файла на сервер');
                  }}}else{
        array_push($errMsg,'Ошибка получения изображения');
        }

    $title=trim(htmlspecialchars($_POST['title']));
    $content=trim(htmlspecialchars($_POST['content']));
    $topic= trim(htmlspecialchars($_POST['topic']));
    $publish= trim(htmlspecialchars($_POST['publish']))!==null ? 1 : 0;



    if($title===''||$content===''||$topic===''){
        array_push($errMsg,'Заполните все поля');
    }elseif (strpos($_FILES['img']['type'], 'image')===false) {
        array_push($errMsg,'Подгружаемый файл не является изображением');}
    elseif (mb_strlen($title,'UTF-8')<=7){
        array_push($errMsg,'Название не может быть короче 7ми символов');
    }else {


    $post = [
        'id_user' => $_SESSION['id'],
        'title' => $title,
        'content' => $content,
        'img' => $timNam. $_POST['img'],
        'status' => 1,
        'id_topic' => $topic
    ];

    $post = insert_to('posts', $post);
    $post = selectOne('posts', ['id' => $id]);
    header('location:' . BASE_PATH . 'admin/posts/index.php');


  }

}else{
    $title="";
    $content="";
}
//Редактирование поста
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['id'])){

    $errMsg=[];
    $id=$_GET['id'];
    $post=selectOne('posts',['id'=>$id]);
    $title=$post['title'];
    $content=$post['content'];
    $topic=$post['id_topic'];
    $publish=$post['status'];
}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['edit_post'])){
    $errMsg=[];

    $id=trim($_POST['id']);
    $title=trim($_POST['title']);
    $content=trim($_POST['content']);
    $topic= trim($_POST['topic']);
    $publish= ($_POST['publish'])?1:0;


    if(!empty($_FILES['img']['name'])) {
        $imgName = $_FILES['img']['name'];
        $timName=time();
        $imgTmpName = $_FILES['img']['tmp_name'];
        $destination= ROOT_PATH . "\assets\imeges\post\\" . $timName.$imgName;
        $fileType=$_FILES['img']['type'];
        $size=$_FILES['img']['size'];
        if(strpos($fileType, 'image')===false) {
            array_push($errMsg,'');

        }elseif($size>900000){
            array_push($errMsg,'Размер файла превышает допустимую норму');
        }else {
            $result = move_uploaded_file($imgTmpName,$destination);
            if($result){
                $_POST['img']=$imgName;
            }else {

                array_push($errMsg,'Ошибка загрузки файла на сервер');
            }}}else{
                   //ошибка получения файла
        header('location:' . BASE_PATH . "admin/posts/edit.php?id=$id&err=img");

    }


    if($title===''||$content===''||$topic===''){
        array_push($errMsg,'Заполните все поля');}
    elseif (strpos($_FILES['img']['type'], 'image')===false) {
        array_push($errMsg,'Подгружаемый файл не является изображением');}
    elseif (mb_strlen($title,'UTF-8')<=7){
        array_push($errMsg,'Название не может быть короче 7ми символов');}
    else {


        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $timName.$_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];



        $post = update('posts', $post, $id);

        header('location:' . BASE_PATH . 'admin/posts/index.php');


    }

}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['err'])){


    array_push($errMsg,'Подгружаемый файл не является изображением');}



if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['delete_id'])){


    $id=$_GET['delete_id'];
    delete('posts',$id);
    header('location:' . BASE_PATH . 'admin/posts/index.php');
}
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['pub_id'])){
    $id=$_GET['pub_id'];
    $pub=$_GET['publish'];
    update('posts',['status'=>$pub],$id);
    header('location:' . BASE_PATH . 'admin/posts/index.php');
    exit();
}
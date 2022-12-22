<?php
include_once $_SERVER['DOCUMENT_ROOT']."/app/database/db.php";
include $_SERVER['DOCUMENT_ROOT']."/path.php";
$page=$_GET['page'];


$email='';
$comment='';
$errMsg=[];
$status=0;
$comments=[];



$allComments=selectAll('comments');

if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['go_c'])){
    $timeSend=time();
    $email=trim(htmlspecialchars($_POST['mail_c']));
    $comment=trim(htmlspecialchars($_POST['text_c']));
    $page_c= trim(htmlspecialchars($_POST['page']));




    if($email===''||$comment===''){
        array_push($errMsg,'Заполните все поля');}

    elseif (mb_strlen($comment,'UTF-8')<=3){
        array_push($errMsg,'Название не может быть короче 3х символов');
    }else {
           $user=selectOne('users',['email'=>$email]);
           if(!empty($user)){
             if($user['email']==$email && $user['admin']== 1){
                 $status = 1;
             }}

        $comment_push = [
            'stat' => $status,
            'email' => $email,
            'comment' => $comment,
            'page'=>$page_c
        ];

        $comm = insert_to('comments', $comment_push);
        $comments = selectAll('comments', ['page' => $page, 'stat'=>1]);
    }
} else {
        $email='';
        $comment='';
        $comments=selectAll('comments', ['page' => $page, 'stat'=>1]);

}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['id'])){
    $id=$_GET['id'];
    $comment1= selectOne('comments',['id'=>$id]);
    $email=$comment1['email'];
    $comment=$comment1['comment'];
    $status=$comment1['stat'];


}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['edit_comment'])){
    $id1= $_POST['id'];

    $comment=trim($_POST['comment']);
    $status= isset($_POST['publish'])?1 :0;

    if($comment===''){
        array_push($errMsg,'Заполните все поля');}

    elseif (mb_strlen($comment,'UTF-8')<=7){
        array_push($errMsg,'Комментарий не может быть короче 7ми символов');}
    else {


        $goComment = [
            'comment' => $comment,
            'stat' => $status,
        ];



        $post = update('comments', $goComment, $id1);

        header('location:' . BASE_PATH . 'admin/comments/index.php');


    }





}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['delete_id'])){


    $id=$_GET['delete_id'];
    delete('comments',$id);
    header('location:' . BASE_PATH . 'admin/comments/index.php');
}
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['pub'])){
    $id=$_GET['pub'];
    $pub=$_GET['publish'];
    update('comments',['stat'=>$pub],$id);
    header('location:' . BASE_PATH . 'admin/comments/index.php');
    exit();
}
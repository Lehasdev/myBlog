<?php
include "D:\Ampps\www\path.php";
include SITE_ROOT ."/app/database/db.php";


$errMsg=[];
$topics=selectAll('topics');
$id='';
$name='';
$description='';
$e_id='';

if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['t_btn'])){

    $name=trim($_POST['name']);
    $description=trim($_POST['descriptions']);
    if($name===''||$description===''){
        array_push($errMsg,'Поля не могут быть пустыми');
    }elseif (mb_strlen($name,'UTF-8')<=2){
        array_push($errMsg,'Название не может быть короче 2х символов');
    }else {
        $existence = selectOne('topics', ['name' => $name]);
        if (!empty($existence['name']) && $existence['name'] === $name) {
            array_push($errMsg,'Такая категория уже есть в базе');
        } else {

            $topic = [
                'name' => $name,
                'discription' => $description
            ];
            $id = insert_to('topics', $topic);
            header('location:' . BASE_PATH . 'admin/topics/index.php');
        }

    }
    } else{
    $name="";
    $description="";
}
//Редактирование категории
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['id'])){


    $id=$_GET['id'];
    $topic=selectOne('topics',['id'=>$id]);
    $id=$topic['id'];
    $name=$topic['name'];
    $description=$topic['discription'];
}
if($_SERVER['REQUEST_METHOD']==='POST'&& isset($_POST['r_btn'])){

    $name=trim($_POST['name']);
    $description=trim($_POST['descriptions']);
    $id=$_POST['id'];

    if (mb_strlen($name,'UTF-8')<=2){

        header('location:' . BASE_PATH . "admin/topics/edit.php?id=$id&er=er");
        } else {

            $topic = [
                'name' => $name,
                'discription' => $description
            ];

            update('topics',$topic,$id);
            header('location:' . BASE_PATH . 'admin/topics/index.php');
        }

    }

if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['er'])){

    array_push($errMsg,'Название не может быть короче 2ух символов');


}
if($_SERVER['REQUEST_METHOD']==='GET'&& isset($_GET['del'])){


    $id=$_GET['del'];
    delete('topics',$id);
    header('location:' . BASE_PATH . 'admin/topics/index.php');
}
<?php
$driver='mysql';
$host='localhost';
$db_name='dynemic_site';
$password='mysql';
$user_name='root';
$charset='utf8';
$options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC
];

try{
    $pdo= new PDO("$driver: host=$host; dbname=$db_name; charset=$charset",$user_name,$password,$options);
} catch (PDOException $i){
    die('Ошибка подключения к базе данных');
}
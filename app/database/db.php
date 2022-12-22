<?php
session_start();
require 'connect.php';
function test($value){
    echo'<pre>';
    print_r($value);
    echo'</pre>';
    exit();
}
//Функция проверки запроса.
function dbCheckErrors($query){
    $allErrors=$query->errorInfo();
    if($allErrors[0] !== PDO::ERR_NONE){
        echo $allErrors[2];
        exit();
    }
    return true;
}
//Функция запроса с одной таблицы.
function selectAll($table,$params=[]){
    global $pdo;
    $sql="SELECT * FROM $table";
    if(!empty($table)){
        $i=0;
        foreach($params as $key=>$values){
            if(!is_numeric($values)){
                $values= "'".$values."'";

            }
            if($i === 0){
                $sql=$sql . " WHERE $key = $values";
            }else{
                $sql=$sql . " AND $key = $values";
            }
            $i++;
        }

    }
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
//Функция запроса одной строки.
function selectOne($table,$params=[]){
    global $pdo;
    $sql="SELECT * FROM $table";
    if(!empty($table)){
        $i=0;
        foreach($params as $key=>$values){
            if(!is_numeric($values)){
                $values= "'".$values."'";

            }
            if($i === 0){
                $sql=$sql . " WHERE $key = $values";
            }else{
                $sql=$sql . " AND $key = $values";
            }
            $i++;
        }

    }
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetch();
}

//Запрос на запись в бд.
function insert_to($table,$param){
    global $pdo;
    $col='';
    $val='';
    $i=0;

    foreach($param as $key=>$value){
        if($i === 0){
            $col= $col ."$key";
            $val=$val ."'"."$value"."'";
        }else{
        $col= $col .", $key";
        $val= $val .", '"."$value"."'";}
        $i++;
    }

    $sql="INSERT $table($col) VALUES ($val)";

    $query=$pdo->prepare($sql);
    $query->execute($param);
    dbCheckErrors($query);
    return $pdo->lastInsertId();
}
function update($table,$param,$id){
    global $pdo;
    $str='';
    $i=0;

    foreach($param as $key=>$value){
        if($i === 0){
            $str= $str .$key."= '".$value."'";

        }else{
            $str= $str .", $key"."= '".$value."'";
            }
        $i++;

    }

    $sql="UPDATE $table SET $str WHERE id=". $id;

    $query=$pdo->prepare($sql);
    $query->execute($param);
    dbCheckErrors($query);
}
function delete($table,$id){
    global $pdo;
    $sql="DELETE FROM $table WHERE id= $id";

    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
}
function selectAllFromPostWithUsers($table1,$table2){
    global $pdo;
    $sql="
    SELECT
        t1.id,
        t1.id_user,
        t1.title,
        t1.img,
        t1.content,
        t1.status,
        t1.id_topic,
        t1.create_date,
        t2.username
    FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
function selectAllFromPostWithUsersOnIndex($table1,$table2,$limit,$offset){
    global $pdo;
    $sql= "SELECT t1.*,t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id WHERE t1.status = 1 LIMIT $limit OFFSET $offset";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
function selectAllFromTopTopicOnIndex($table1){
    global $pdo;
    $sql= "SELECT * FROM $table1 WHERE id_topic =13";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
function search($text,$table1,$table2){
    $textClear=trim(strip_tags(stripcslashes(htmlspecialchars($text))));
    global $pdo;
    $sql="SELECT t1.*,t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
          WHERE t1.status = 1 AND 
          t1.title LIKE '%$textClear%' OR t1.content 
          LIKE '%$textClear%'";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
function selectPostFromPostWithUsersOnSingle($table1,$table2,$id){
    global $pdo;
    $sql= "SELECT t1.*,t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id WHERE t1.id= $id";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetch();
}
function selectAllPostsOnCategory($table1,$table2,$id){
    global $pdo;
    $sql="SELECT t1.*,t2.username FROM $table1 AS t1 JOIN $table2 AS t2 ON t1.id_user = t2.id
          WHERE t1.status = 1 AND t1.id_topic = $id";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchAll();
}
function contRows($table){
    global $pdo;
    $sql="SELECT COUNT(*) FROM $table WHERE status = 1";
    $query=$pdo->prepare($sql);
    $query->execute();
    dbCheckErrors($query);
    return $query->fetchColumn();
}
<?php
include "../../app/controllers/posts.php";


?>
<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Blog</title>

    <script src="https://kit.fontawesome.com/0fe154bbb6.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/style.css" >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Marmelad&display=swap" rel="stylesheet">
</head>
<body>
<?php include ('../../app/include/admin_header.php');?>
<div class="container">
    <div class="row">
        <?php include "../../app/include/sidebar-admin.php";?>
        <div class="post_admin col-9">


            <div class="row title-label">
                <h2>Редактировать запись</h2>

                <div class="err">
                    <p><?php include '../../app/helps/errorInfo.php';?></p>
                </div>

            </div>
            <div class="row  add-cat">
                <form action="create.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?=$_GET['id'];?>">
                    <div class="w-100"></div>
                    <div class="col">
                        <input type="text" value="<?=$title;?>" name="title" class="form-control" placeholder="Заголовок" aria-label="Заголовок">
                    </div>
                    <div class="w-100"></div>
                    <div class="col">
                        <lable for="content" class="form-label">Содержимое записи</lable>
                        <textarea id="editor" class="form-control" name="content" id="content" rows="6"><?=$content;?></textarea>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col">
                        <input type="file" name="img" class="form-control" id="inputGroupFile02">
                        <label class="input-group-text" for="inputGroupFile02">Загрузить</label>
                    </div>
                    <div class="w-100"></div>
                    <select class="form-select" name="topic" aria-label="example">

                        <?php foreach ($topics as $key => $topic):;?>

                            <option value="<?=$topic['id']?>"><?=$topic['name'];?></option>
                        <?php endforeach;?>
                    </select>
                    <div class="w-100"></div>
                    <div class="form-check">
                        <input name="publish" class="form-check-input" type="checkbox" value="1" id="flex-Check-Checked">
                        <label class="form-check-label" for="flex-Check-Checked">Publish</label>
                    </div>
                    <div class="w-100"></div>
                    <div class="col">

                        <button class="btn btn-primary" name="edit_post" type="submit">Изменить запись</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>









    </div>




</div>

<!--Блок footer start-->
<?php include('../../app/include/footer.php');?>
<!--Блок footer end-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>"
<script src="../../assets/js/scripts.js"></script>
</body>
</html>



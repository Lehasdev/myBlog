
<h3>Оставить комментарий</h3>
<div class="err">
    <p><?php include 'app/helps/errorInfo.php';?></p>
</div>
<form action="<?= BASE_PATH."single_page.php?page=$page";?>" method="post">
    <input type="hidden" name="page" value="<?=$page;?>" >
    <div class="mb-3 col-12">
        <label for="exampleFormControlInput1" class="form-label">Email</label>
        <input type="email" name="mail_c" class="form-control" id="exampleFormControlInput1" placeholder="Ваш Email">
    </div>
    <div class="mb-3 col-12">
        <label for="exampleFormControlTextarea1" class="form-label">Введите комментарий</label>
        <textarea class="form-control" name="text_c" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
    <button type="submit" name="go_c" class="btn btn-primary col-2">Отправить</button>
</form>

<?php if(count($comments)>0):?>
<div class="row all-comments">
    <h3 class="col-12">Комментарии к записи:</h3>
    <?php foreach ($comments as $comm):?>
    <div class="one_comment col-12">
        <span><i class="far fa-envelope"></i><?=$comm['email'];?></span>
        <span><i class="far fa-calendar-check"></i><?=$comm['create_date'];?></span>
        <div class="text col-12">
            <?=$comm['comment'];?>
        </div>
    </div>
    <?php endforeach;?>
</div>
<?php endif;?>
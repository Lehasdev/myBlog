<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" href="?pg=1">First</a>
        </li>
        <?php for($i=1;$i<=$last;$i++):?>
            <li class="page-item">
                <a class="page-link" href="?pg=<?php echo $i;?>"><?php echo $i;?></a>
            </li>
        <?php endfor;?>

        <li class="page-item">
            <a class="page-link" href="?pg=<?= $last;?> ">Last</a>
        </li>
    </ul>
</nav>
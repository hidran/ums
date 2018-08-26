<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?= $page==1 ?' disabled':''?>">
            <a class="page-link" href="<?="$pageUrl?page=".($page-1)?>" tabindex="-1">Previous</a>
        </li>
        <?php
         for ($i = 1; $i<= $numPages; $i++):

             $class = $i == $page ? ' active' : '';
         if($class) : ?>
             <li class="page-item<?=$class?>">
                 <a href="#" class="page-link" disabled>
                 <?=$i?>
                 </a>
             </li>

         <?php else :?>
            <li class="page-item"><a class="page-link" href="<?="$pageUrl?page=$i"?>"><?=$i?></a></li>
         <?php
            endif;
         ?>

        <?php endfor ?>

        <li class="page-item<?= $page==$numPages ?' disabled':''?>"> <a class="page-link" href="<?="$pageUrl?page=".($page+1)?>">Next</a></li>
    </ul>
</nav>
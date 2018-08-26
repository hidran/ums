<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1">Previous</a>
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

        <a class="page-link" href="#">Next</a>
    </ul>
</nav>
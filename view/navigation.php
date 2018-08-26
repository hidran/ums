<?php
 $numLinks = getConfig('numLinkNavigator', 5);
?>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?= $page==1 ?' disabled':''?>">
            <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=".($page-1)?>" tabindex="-1">Previous</a>
        </li>
        <?php
              // 12 +5 = 17
              // 17 - 14 = 3
        //  6 + 5 = 11
        // 11 -14 = -3  non prendiamo se il valore negativo
        $extraLink = $page + $numLinks - $numPages;
        $extraLink = $extraLink >0 ? $extraLink : 0;
          $startValue = $page - $numLinks - $extraLink;


           $startValue = $startValue < 1 ? 1 : $startValue;
         for ($i = $startValue ; $i < $page; $i++): ?>
             <li class="page-item">
                 <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=$i"?>">
                     <?=$i?>
                 </a>
             </li>
        <?php

         endfor;

            ?>

             <li class="page-item active">
                 <a href="#" class="page-link disabled">
                 <?=$page?>
                 </a>
             </li>
        <?php
        //    page = 2;
         // 2 -5 = -3
        $extraLink = ($page - $numLinks) < 0 ? abs($page - $numLinks) : 0;

        $startValue = $page + 1 ;
        $startValue = $startValue < 1 ? 1 : $startValue;
        $endValue = $page  + $numLinks  + $extraLink;

         $endValue = min($endValue, $numPages);

        for ($i = $startValue ; $i <=$endValue; $i++): ?>
            <li class="page-item">
                <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=$i"?>">
                    <?=$i?>
                </a>
            </li>
        <?php

        endfor;

        ?>




        <li class="page-item<?= $page == $numPages ?' disabled':''?>">
            <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=".($page+1)?>">
                Next
            </a>
        </li>
    </ul>
</nav>
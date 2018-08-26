<?php
 $numLinks = getConfig('numLinkNavigator', 5);
?>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?= $page==1 ?' disabled':''?>">
            <a class="page-link" href="<?="$pageUrl?$navOrderByQueryString&page=".($page-1)?>" tabindex="-1">Previous</a>
        </li>
        <?php
          $startValue = $page - $numLinks;
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
        $startValue = $page + 1 ;
        $startValue = $startValue < 1 ? 1 : $startValue;
        $endValue = ($page  + $numLinks);
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

<?php
$orderDirClass = $orderDir;

 $orderDir = $orderDir ==='ASC' ? 'DESC' : 'ASC';
?>
<table class="table table-striped">
<caption>USERS LIST</caption>
    <thead>
    <tr>
        <th class="<?=$orderBy ==='id'?$orderDirClass: ''?>"><a href="<?=$page?>?orderBy=id&orderDir=<?=$orderDir?>">ID</a></th>
        <th class="<?=$orderBy ==='username'?$orderDirClass: ''?>"><a href="<?=$page?>?orderBy=username&orderDir=<?=$orderDir?>">NAME</a></th>
        <th class="<?=$orderBy ==='fiscalcode'?$orderDirClass: ''?>"><a href="<?=$page?>?orderBy=fiscalcode&orderDir=<?=$orderDir?>">FISCAL CODE</a></th>
        <th class="<?=$orderBy ==='email'?$orderDirClass: ''?>"><a href="<?=$page?>?orderBy=email&orderDir=<?=$orderDir?>">EMAIL </a></th>
        <th class="<?=$orderBy ==='age'?$orderDirClass: ''?>"> <a href="<?=$page?>?orderBy=age&orderDir=<?=$orderDir?>">AGE</a></th>
    </tr>
    </thead>
    <tbody>
    <?php
      if($users) {

           foreach ($users as $user){ ?>

              <tr>
                  <td><?=$user['id']?></td>
                  <td><?=$user['username']?></td>
                  <td><?=$user['fiscalcode']?></td>
                  <td><a href="mailto:<?=$user['email']?>"> <?=$user['email']?></a></td>
                  <td><?=$user['age']?></td>
              </tr>

        <?php
           }
           ?>
    </tbody>
    <tfoot>
      <tr><td colspan="5" class="text-center">
            <?php
             require_once 'navigation.php';
            ?>
        </td></tr></tfoot>

<?php
      } else {

          echo '<tr><td colspan="5" class="text-center"> <h2>No Records foun</h2></td></tr>';
      }
    ?>

</table>
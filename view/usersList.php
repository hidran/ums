<?php
$orderDirClass = $orderDir;

$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>
<table class="table table-striped table-dark table-bordered">
    <caption>USERS LIST</caption>
    <thead>
    <tr>
        <th colspan="6" class="text-center">TOTAL USERS <?= $totalUsers ?>. Page <?=$page?> of <?= $numPages ?></th>
    </tr>
    <tr>
        <th class="<?= $orderBy === 'id' ? $orderDirClass : '' ?>">
            <a href="<?= $pageUrl ?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderBy=id">
                ID</a>
        </th>
        <th class="<?= $orderBy === 'username' ? $orderDirClass : '' ?>">
            <a href="<?= $pageUrl ?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderBy=username">
                NAME
            </a>
        </th>
        <th>AVATAR</th>
       <th class="<?= $orderBy === 'fiscalcode' ? $orderDirClass : '' ?>">
            <a href="<?= $pageUrl ?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderBy=fiscalcode">
                FISCAL CODE</a>
        </th>
        <th class="<?= $orderBy === 'email' ? $orderDirClass : '' ?>">
            <a href="<?= $pageUrl ?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderBy=email">
                EMAIL
            </a>
        </th>
        <th class="<?= $orderBy === 'age' ? $orderDirClass : '' ?>">
            <a href="<?= $pageUrl ?>?<?=$orderByQueryString?>&orderDir=<?=$orderDir?>&orderBy=age">
                AGE
            </a>
        </th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
    if ($users) {

        $webAvatarDir = getConfig('webAvatarDir');
        $avatarDir = getConfig('avatarDir');
         $thumbWidth = getConfig('thumbnail_width');

    foreach ($users as $user) {

        $avatarImg = file_exists($avatarDir.'thumb_'.$user['avatar'])? $webAvatarDir.'thumb_'.$user['avatar'] : $webAvatarDir.'placeholder.jpg';

        ?>

        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><img src="<?=$avatarImg?>" alt=""></td>
            <td><?= $user['fiscalcode'] ?></td>
            <td><a href="mailto:<?= $user['email'] ?>"> <?= $user['email'] ?></a></td>
            <td><?= $user['age'] ?></td>
            <td>
                <div class="row">
                    <div class="col-6">
                        <a class="btn btn-success"

                           href="<?=$updateUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&action=update&id=<?=$user['id']?>">
                            <i class="fa fa-pen"></i>
                            UPDATE
                        </a>
                    </div>
                    <div class="col-6">
                        <a onclick="return confirm('DELETE USER?')"
                           class="btn btn-danger"

                           href="<?=$deleteUserUrl?>?<?=$navOrderByQueryString?>&page=<?=$page?>&id=<?=$user['id']?>&action=delete">
                            <i class="fa fa-trash"></i>
                            DELETE
                        </a>
                    </div>
                </div>
            </td>
        </tr>

        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="6" class="text-center">
            <?php
            require_once 'navigation.php';
            ?>
        </td>
    </tr>
    </tfoot>

    <?php
    } else {

        echo '<tr><td colspan="6" class="text-center"> <h2>No Records found</h2></td></tr>';
    }
    ?>

</table>
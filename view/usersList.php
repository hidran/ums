<?php
$orderDirClass = $orderDir;

$orderDir = $orderDir === 'ASC' ? 'DESC' : 'ASC';
?>
<table class="table table-striped">
    <caption>USERS LIST</caption>
    <thead>
    <tr>
        <th colspan="5" class="text-center">TOTAL USERS <?= $totalUsers ?> num pages<?= $numPages ?></th>
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
    </tr>
    </thead>
    <tbody>
    <?php
    if ($users) {

    foreach ($users as $user) { ?>

        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['username'] ?></td>
            <td><?= $user['fiscalcode'] ?></td>
            <td><a href="mailto:<?= $user['email'] ?>"> <?= $user['email'] ?></a></td>
            <td><?= $user['age'] ?></td>
        </tr>

        <?php
    }
    ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="5" class="text-center">
            <?php
            require_once 'navigation.php';
            ?>
        </td>
    </tr>
    </tfoot>

    <?php
    } else {

        echo '<tr><td colspan="5" class="text-center"> <h2>No Records foun</h2></td></tr>';
    }
    ?>

</table>
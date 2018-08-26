<?php
require_once 'functions.php';
require_once 'view/top.php';

$page = $_SERVER['PHP_SELF'];

$orderDir = getParam('orderDir', 'DESC');

$orderBy = getParam('orderBy', 'id');

$recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));

$recordsPerPageOptions = getConfig('recordsPerPageOptions',[5,10,20,30,50]);

require_once 'view/navbar.php';
?>


<!-- Begin page content -->
<main role="main" class="container">
    <h1>USER MANAGEMENT SYSTEM </h1>
    <?php
    $action = getParam('action');

    switch ($action) {

        case 'insert':
            break;

        default:


            if (!in_array($orderBy, getConfig('orderByColumns'))) {
                $orderBy = 'id';
            }
            $params = [
                'orderBy' => $orderBy,
                'orderDir' => $orderDir,
                'recordsPerPage' => $recordsPerPage
            ];

            $users = getUsers($params);

            require_once 'view/usersList.php';

    }
    ?>
</main>

<?php
require_once 'view/footer.php';
?>

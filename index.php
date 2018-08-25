<?php
require_once 'functions.php';
require_once 'view/top.php';
require_once 'view/navbar.php';
?>


<!-- Begin page content -->
<main role="main" class="container">
    <h1>USER MANAGEMENT SYSTEM </h1>
    <?php
    $action = getParam('action');
    $page = $_SERVER['PHP_SELF'];
    switch ($action) {

        case 'insert':
            break;

        default:
            $orderDir = getParam('orderDir', 'DESC');

            $orderBy = getParam('orderBy', 'id');

            if (!in_array($orderBy, getConfig('orderByColumns'))) {
                $orderBy = 'id';
            }
            $params = [
                'orderBy' => $orderBy,
                'orderDir' => $orderDir
            ];

            $users = getUsers($params);

            require_once 'view/usersList.php';

    }
    ?>
</main>

<?php
require_once 'view/footer.php';
?>

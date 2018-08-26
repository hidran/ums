<?php
session_start();
require_once '../functions.php';
$action = getParam('action', '');
require '../model/User.php';

switch ($action) {

    case 'delete':
        $params = $_GET;
         unset($params['action']);
        unset($params['id']);
         $queryString = http_build_query($params);
        $id = getParam('id', 0);
        $res = delete($id);
        $message = $res ? 'USER '.$id.' DELETED' : 'ERROR DELETING USER '.$id;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?'.$queryString);
        break;
}

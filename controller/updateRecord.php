<?php
session_start();

require_once '../functions.php';
$action = getParam('action', '');
require '../model/User.php';
$params = $_GET;
unset($params['action']);
unset($params['id']);
$queryString = http_build_query($params);
switch ($action) {

    case 'delete':


        $id = getParam('id', 0);
        $userData = getUser($id);
        $res = delete($id);
        if($res){
            removeOldAvatar($id,$userData);
        }
        $message = $res ? 'USER '.$id.' DELETED' : 'ERROR DELETING USER '.$id;
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        $url = '../index.php?'.$queryString;
        header('Location:'.$url);
        break;

    case 'save':
        $data = $_POST;

        $res = saveUser($data);
        var_dump($res);
        //die;
        if($res['id'] > 0){
            $resCopy = copyAvatar($res['id']);

            if($resCopy['success']){
                updateUserAvatar($res['id'], $resCopy['filename']);
            }

            $message =  'USER INSERTED WITH ID '.$res['id']. ' INSERTED';
        } else {
            $message=    'ERROR INSERTING USER '. $data['username']. ':'.$res['message'];
        }

        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;

        header('Location:../index.php?'.$queryString);
        break;

    break;
    case 'store':
        $data = $_POST;
        $id = getParam('id',0);
        $resCopy = copyAvatar($id);

        if($resCopy['success']){
            removeOldAvatar($id);
            $data['avatar'] = $resCopy['filename'];
        }
        $res = storeUser($data, $id);

        if( $res['success']){
            $message = 'USER '.$id.' UPDATED' ;
        } else {
            $message = 'ERROR UPDATING USER '.$id .':'. $res['error'];
        }
        if( !$resCopy['success']){
            $message .= $resCopy['message'];
        }
        $_SESSION['message'] = $message;
        $_SESSION['success'] = $res;
        header('Location:../index.php?'.$queryString);
        break;
}

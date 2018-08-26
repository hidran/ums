<?php
require_once '../connection.php';

function delete(int $id){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];

    $sql = 'DELETE FROM users WHERE id ='.$id;

    $res = $conn->query($sql);
    return $res && $conn->affected_rows;
}
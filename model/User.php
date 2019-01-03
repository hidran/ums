<?php

function delete(int $id){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];

    $sql = 'DELETE FROM users WHERE id ='.$id;

    $res = $conn->query($sql);
    return $res && $conn->affected_rows;
}
function getUser(int $id){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
     $result = [];
    $sql = 'SELECT *  FROM users WHERE id ='.$id;
   // echo $sql;

    $res = $conn->query($sql);
    if($res && $res->num_rows) {
        $result = $res->fetch_assoc();
    } else {
        die($conn->error);
    }
   return  $result;
}

function storeUser(array $data, int $id){

    /**
     * @var $conn mysqli
     */
    $result = [
        'success' => 1,
        'affectedRows' => 0,
        'error' => ''
    ];

    $conn = $GLOBALS['mysqli'];
    $username = $conn->escape_string($data['username']);
    $email = $conn->escape_string($data['email']);
    $fiscalcode = $conn->escape_string($data['fiscalcode']);
    $age = $conn->escape_string($data['age']);
    $sql = 'UPDATE users SET ';
    $sql .= "username='$username', email='$email',fiscalcode='$fiscalcode',";
    $sql .= "age=$age";
    $sql .= ' WHERE id ='.$id;
    // echo $sql;

    $res = $conn->query($sql);
    if($res) {
        $result['affectedRows'] =  $conn->affected_rows;

    } else {
        $result['success'] = false;
        $result['error'] = $conn->error;
    }
    return  $result;
}

function saveUser(array $data){

    /**
     * @var $conn mysqli
     */
    $conn = $GLOBALS['mysqli'];
    $username = $conn->escape_string($data['username']);
    $email = $conn->escape_string($data['email']);
    $fiscalcode = $conn->escape_string($data['fiscalcode']);
    $age = (int)$data['age'];
    $result = 0;
    $sql = 'INSERT INTO users (username, email, fiscalcode,age) ';
    $sql .= " VALUE('$username', '$email','$fiscalcode',$age)";
  //echo $sql;
    $res = $conn->query($sql);
    if($res && $conn->affected_rows) {
        $result =  $conn->insert_id;
    } else {
         die( $conn->error);
        $result =  -1;
    }
    return  $result;
}
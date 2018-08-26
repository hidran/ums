<?php
  require_once 'connection.php';

      function getConfig($param, $default = null){

          $config = require 'config.php';

          return array_key_exists($param, $config) ? $config[$param] : $default;
      }

       function getParam($param, $default = null){

         return  !empty($_REQUEST[$param])? $_REQUEST[$param]: $default;

       }
    function getRandName() {
        $names = [
            'ROBERTO','GIOVANNI','GIULIA','MARIO','ALE'
        ];
        $lastnames = [
            'ROSSI','RE','ARIAS','SMITH','MENDOZA','CRUZ','WILDE'

        ];

        $rand1 =  mt_rand(0, count($names) -1) ;
        $rand2 =  mt_rand(0, count($lastnames) -1);

      return  $names[$rand1].' '. $lastnames[$rand2] ;
    }

    //echo getRandName();
    function getRandEmail($name){

        $domains = ['google.com','yahoo.com','hotmail.it', 'libero.it'];

        $rand1 =  mt_rand(0, count($domains) -1) ;

        return  strtolower(str_replace(' ','.',$name ).mt_rand(10,99).'@'.$domains[$rand1]);

    }
    function getRandFiscalCode(){

        $i = 16;
        $res = '';  // ABQZ

        while ( $i > 0){

            $res .= chr(mt_rand(65,90));

            $i--;

        }
        return $res;

    }
    function getRandomAge(){
         return mt_rand(0, 120);
    }

    function insertRandUser($totale, mysqli $conn){

        while ($totale> 0) {

            $username = getRandName();
            $email = getRandEmail($username);
            $fiscalcode = getRandFiscalCode();
            $age = getRandomAge();

            $sql = 'INSERT INTO users (username, email, fiscalcode, age) VALUES ';
            $sql .= " ('$username','$email', '$fiscalcode', $age) ";
            echo $totale .' '.$sql.'<br>';
            $res = $conn->query($sql);
            if (!$res) {
                echo $conn->error.'<br>';
            } else {
                $totale--;
            }
        }
    }

    function getUsers( array $params = []){

        /**
         * @var $conn mysqli
         */

            $conn = $GLOBALS['mysqli'];

            $orderBy = array_key_exists('orderBy', $params) ? $params['orderBy'] : 'username';

            $orderDir = array_key_exists('orderDir', $params) ? $params['orderDir'] : 'ASC';

           $limit = (int)array_key_exists('recordsPerPage', $params) ? $params['recordsPerPage'] : 10;

            if($orderDir !=='ASC' && $orderDir !=='DESC') {
                $orderDir = 'ASC';
            }
           $records = [];




            $sql = "SELECT * FROM users ORDER BY $orderBy $orderDir LIMIT 0, $limit ";
echo $sql;
            $res = $conn->query($sql);
            if($res) {

             while( $row = $res->fetch_assoc()) {
                 $records[] = $row;
             }

            } else {
                die($conn->error);
            }

        return $records;

    }
















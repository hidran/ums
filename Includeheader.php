<?php
$pageUrl = $_SERVER['PHP_SELF'];

$updateUrl = 'controller/updateRecord.php';
$orderDir = getParam('orderDir', 'ASC');

$orderBy = getParam('orderBy', 'id');

$orderByColumns =  getConfig('orderByColumns',['id','lastname','email','fiscalcode','age']);

$recordsPerPage = getParam('recordsPerPage', getConfig('recordsPerPage'));

$recordsPerPageOptions = getConfig('recordsPerPageOptions',[5,10,20,30,50]);

$search = getParam('search' ,'') ;

$page = getParam('page',1);

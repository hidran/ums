<?php
//echo $_SERVER['DOCUMENT_ROOT'];
$mega = 1024*1024;
$giga = $mega*1024;

$maxUpload =  ini_get('upload_max_filesize');

 if(stristr($maxUpload,'G')){
     $maxUpload = intval($maxUpload)*$giga;
 } else {
     $maxUpload = intval($maxUpload)* $mega;
 }
return [
    'mysql_host' => 'localhost',
    'mysql_user' => 'root',
    'mysql_password' => 'hidran',
    'mysql_db' => 'corsophp',
    'recordsPerPage' => 10,
    'recordsPerPageOptions' => [
        5,10,20,30,50,100
    ],
    'orderByColumns' => [
        'id','email','fiscalcode','age','username','roletype'
    ],
    'numLinkNavigator' => 5,
    'maxFileUpload' => $maxUpload,

    'avatarDir' => $_SERVER['DOCUMENT_ROOT'].'/avatar/',
    'webAvatarDir' => '/avatar/',
    'thumbnail_width' => 200,
    'previewimg_width' => 600,
    'roletypes' => ['user','editor','admin']
];





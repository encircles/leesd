<?php

require_once 'model/usersService.class.php';

$userv=new usersService();

$arr=$userv->getHeadsUrl("test1");

$url=$arr[0]['heads_url'];

if(file_exists($url)){
    echo "yes";
}else{
    echo "no";
}
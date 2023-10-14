<?php

$connect=new mysqli('localhost','root','','ecommerce');
if($connect->connect_errno)
{
    echo "Error";
    die;
}

?>
<?php

$connection=mysqli_connect('localhost','root','','shop');

if (!$connection) {
    echo"connection faild".mysqli_connect_error();
}


?>
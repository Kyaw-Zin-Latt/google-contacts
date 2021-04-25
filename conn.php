<?php

$conn = mysqli_connect("localhost", "root", "", "my_list");

//Checking Connection
if(!$conn){
    die("connection failed :" .mysqli_connect_error());
}

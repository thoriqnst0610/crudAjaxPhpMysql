<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "ajax";

$conn = new mysqli($host, $user, $pass, $db);

if($conn->connect_error){
    die("koneksi Gagal :".$conn->connect_error);
}
?>
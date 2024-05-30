<?php 
$host = 'localhost:3307';
$user = 'root';
$password = '';
$database = 'artstation';

$koneksi = mysqli_connect($host, $user, $password, $database);

if(!$koneksi) {
    die('Connection Failed: ' . mysqli_connect_error());
}

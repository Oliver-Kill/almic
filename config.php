<?php
session_start();
$host = "localhost";
$user = "root";
$password = "root";
$dbname = "almic";

$con = mysqli_connect($host, $user, $password,$dbname);

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}
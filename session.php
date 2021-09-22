<?php
   include('config.php');
   
   if(!isset($_COOKIE['member_login']) && !isset($_SESSION['email'])){
      header("location:index.php");
      die();
   }
?>
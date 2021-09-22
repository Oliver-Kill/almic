<?php
   session_start();

   // Unset cookie when the user logs out
   if(isset($_COOKIE['member_login'])) {
		setcookie('member_login');
   }

   // Destroy session and direct user to login page
   if(session_destroy()) {
      	header("Location: index.php");
   }
?>
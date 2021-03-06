<?php
include "config.php";

// Redirect user to menu view if a "member_login" cookie is set
if(isset($_COOKIE['member_login'])) {
   header("location:menu.php");
}

if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $password = mysqli_real_escape_string($con,$_POST['password']);

    if ($email != "" && $password != ""){

        $sql_query = "select count(*) as userCount from users where username='".$email."' and pw=MD5('".$password."')";
        $result = mysqli_query($con,$sql_query);
        $row = mysqli_fetch_array($result);

        $count = $row['userCount'];

        if($count > 0){
            if(!empty($_POST["remember"])) {
                // Create a cookie for 10 years if the user wishes to be remembered
				setcookie("member_login",$_POST["email"],time()+ (10 * 365 * 24 * 60 * 60), httponly:true);
			}
            $_SESSION['email'] = $email;
            header('Location: menu.php');
        }else{
            echo "Invalid email and/or password";
        }
    }
}
?>
<html>
	<head>
        <style>
            label, input {
                margin:0 5px 5px 0;
            }
        </style>
	</head>
	<body>
	<form action="" method="post">
        <label for="email">Email</label><input name="email" type="email"><br/>
        <label for="password">Password</label><input name="password" type="password"><br/>
        <label for="remember">Remember me</label><input name="remember" type="checkbox"><br/>
		<input name="submit" type="submit">
	</form>
	<script>
	</script>
	</body>
</html>

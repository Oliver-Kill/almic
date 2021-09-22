<?php
   	include('session.php');

	// Insert new menu
	if(isset($_POST['menu_name']) && isset($_POST['id'])) {
		mysqli_query($con,"UPDATE menus SET menu_name='".$_POST['menu_name']."' WHERE id=".$_POST['id']);
	} else {
		echo "Insufficient parameters";
	}
?>
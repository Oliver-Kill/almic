<?php
   	include('session.php');

	// Insert new menu
	mysqli_query($con,"INSERT into menus (menu_name, parent_menu, child_index) VALUES ('', ".$_POST['parent_menu'].", ".$_POST['child_index'].")");
	
	// Result for rendering
	include('menu_view.php');
?>
<?php
   	include('session.php');

	// Delete menu
	mysqli_query($con,"DELETE FROM menus WHERE id=".$_POST['id']);
	
	// Result for rendering
	include('menu_view.php');
?>
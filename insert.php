<?php
   	include('session.php');

	// Insert new menu
	mysqli_query($con,"INSERT into menus (menu_name, parent_menu, child_index) VALUES ('', ".$_POST['parent_menu'].", ".$_POST['child_index'].")");
	
	$sql_query = "SELECT * FROM menus";
	$result = mysqli_query($con,$sql_query);
	if (mysqli_num_rows($result) > 0) {
		// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
		   if(empty($row['parent_menu'])) {
			  echo "<input id='name' class='parent' type='text' value='".$row['menu_name']."'>
					<input data-parentid='".$row['id']."' id='add' type='button' value='+'>
					<input id='remove' type='button' value='-'><br />";
		   } else {
			  echo "<input id='name' style='margin-left:".$row['child_index']."rem;' class='child' type='text' value='".$row['menu_name']."'>
					<input data-parentid='".$row['id']."' data-childindex='".$row['child_index']."' id='add' type='button' value='+'>
					<input id='remove' type='button' value='-'><br />";
		   }
		}
	 }
?>
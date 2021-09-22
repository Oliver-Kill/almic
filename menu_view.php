<?php

$sql_query = "SELECT * FROM menus ORDER BY child_index, parent_menu";
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
	// output data of each row
	while($row = mysqli_fetch_assoc($result)) {
	   if(empty($row['parent_menu'])) {
		  echo "<div data-id='".$row['id']."' class='parent'>
					<input id='name' type='text' value='".$row['menu_name']."'>
					<input id='add' type='button' value='+'>
					<input id='remove' type='button' value='-'>
				</div>";
	   } else {
		  echo "<div data-id='".$row['id']."' data-childindex='".$row['child_index']."' style='margin-left:".$row['child_index']."rem;' class='child'>
					<input id='name' type='text' value='".$row['menu_name']."'>
					<input id='add' type='button' value='+'>
					<input id='remove' type='button' value='-'>
				</div>";
	   }
	}
 }
 ?>
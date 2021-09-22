<?php
   include('session.php');
   $sql_query = "SELECT * FROM menus ORDER BY child_index, parent_menu";
	$result = mysqli_query($con,$sql_query);
?>
<html>
   
   <head>
      <title>Multi level menu</title>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <style>
      </style>
   </head>
   
   <body>

      <div class="results">
         <?php
            if (mysqli_num_rows($result) > 0) {
               // output data of each row
               while($row = mysqli_fetch_assoc($result)) {
                  //asort($row);
                  if(empty($row['parent_menu'])) {
                     echo "<input id='name' data-id='".$row['id']."' class='parent' type='text' value='".$row['menu_name']."'>
                           <input data-parentid='".$row['id']."' id='add' type='button' value='+'>
                           <input id='remove' type='button' value='-'><br />";
                  } else {
                     echo "<input id='name' data-id='".$row['id']."' style='margin-left:".$row['child_index']."rem;' class='child' type='text' value='".$row['menu_name']."'>
                           <input data-parentid='".$row['id']."' data-childindex='".$row['child_index']."' id='add' type='button' value='+'>
                           <input id='remove' type='button' value='-'><br />";
                  }
               }
            }
         ?>
      </div>

      <h2><a href="logout.php">Sign Out</a></h2>

      <script>

         $("[id=add]").click(function() {
            // Add new database line for menu with correct parentId, empty name and corresponding child index
            let parent_menu = $(this).data('parentid')
            let child_index = $(this).data('childindex') ? $(this).data('childindex') + 1 : 1
            $.post(
               'insert.php',
               {
                  parent_menu: parent_menu,
                  child_index: child_index
               },
               function(result){
                  console.log(parent_menu + ' - ' + child_index)
                  $(".results").empty()
                  $(".results").html(result)
               }
            )
         })

         $('[id=name]').on('input',function(e){
            // Change menu_name where id is equal to the one provided
            let menu_name = $(this).val();
            let id = $(this).data('id');
            $.post(
               'update.php',
               {
                  menu_name: menu_name,
                  id: id
               },
               function(result){
                  console.log(menu_name + ' - ' + id)
                  console.log(result)
               }
            )
         });
      </script>
   </body>
</html>
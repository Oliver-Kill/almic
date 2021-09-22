<?php
   include('session.php');
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
            include('menu_view.php');
         ?>
      </div>

      <h2><a href="logout.php">Sign Out</a></h2>

      <script>

         $(".results").on('click', '[id=remove]', function() {
            // Remove database line with correct id and cascade rule removes child menus as well
            let id = $(this).parent().data('id')
            $.post(
               'delete.php',
               {
                  id: id
               },
               function(result){
                  $(".results").empty()
                  $(".results").html(result)
               }
            )
         })

         $(".results").on('click', '[id=add]', function() {
            // Add new database line for menu with correct parentId, empty name and corresponding child index
            let parent_menu = $(this).parents('.parent') ? $(this).parent().data('id') : 0
            // Ternary because adding a 1 to undefined or NaN value does not work
            let child_index = $(this).parent().data('childindex') ? $(this).parent().data('childindex') + 1 : 1
            $.post(
               'insert.php',
               {
                  parent_menu: parent_menu,
                  child_index: child_index
               },
               function(result){
                  $(".results").empty()
                  $(".results").html(result)
               }
            )
         })

         $(".results").on('input', '[id=name]', function(){
            // Change menu_name where id is equal to the one provided
            let menu_name = $(this).val();
            let id = $(this).parent().data('id');
            $.post(
               'update.php',
               {
                  menu_name: menu_name,
                  id: id
               }
            )
         });
      </script>
   </body>
</html>
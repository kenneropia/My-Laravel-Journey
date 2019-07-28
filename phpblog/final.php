<?php include "config/config.php"; ?>
<?php include "libraries/database.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "helpers/format_helper.php";?>
<?php

$db = new Database();

     

       $query = "SELECT * FROM categories";

       $categories = $db->select($query);
 ?>

 <div class="panel panel-default">
  <div class="panel-body text-center">
  <p class="lead">No more post to display</p>
  <p> <a class="readmore" href="index.php">Would you like to go back to our main page</a></p>
  </div>
</div>

 <?php include "includes/footer.php"; ?>
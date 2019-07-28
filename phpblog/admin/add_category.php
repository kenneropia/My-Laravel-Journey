<?php include "includes/header.php"; ?>
<?php 

if (isset($_POST['submit'])) {
     $category = mysqli_real_escape_string($db->link, $_POST['name']);

     if ($category == "") {
              
        $error = "Please fill out all required fields";
     } else{
      $query = "INSERT INTO categories (name)
        VALUES('$category')";

        $insert_row = $db->insert($query);
     }
  }

?>



  <form role="form" method="post" action="add_category.php"><br>
  <div class="form-group">
    <label>Category Title</label>
    <input name="name" type="text" class="form-control" placeholder="Enter category">
  </div>
  <div>
  <input value="submit" name="submit" type="submit" class="btn btn-success">
  <a href="index.php" class="btn btn-default">cancel</a>
</div>
<?php include "includes/footer.php";?>
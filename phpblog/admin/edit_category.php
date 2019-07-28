<?php include "includes/header.php"; ?>

<?php
    $id = $_GET['id'];

     $db = new Database(); 

    $query = "SELECT * FROM categories WHERE id = ".$id;

    $categories = $db->select($query);

    $row = $categories->fetch_assoc();

 ?>

 <?php if (isset($_POST['submit'])) {
     $category = mysqli_real_escape_string($db->link, $_POST['category']);

     if ($category == "") {
              
        $error = "<p class='lead text-center alert alert-danger'>Please fill out all required fields</p>";
        echo $error;
     } else{
      $query = "UPDATE categories 
      SET
     name = '$category'
      WHERE id =".$id;

        $update_row = $db->update($query);
     }
  } ?>

  <?php 
   if (isset($_POST['delete'])) {
     $query = "DELETE FROM categories WHERE id = ".$id;
     $delete_row = $db->delete($query);
      $query = "DELETE FROM posts WHERE category =".$category;
           $delete_row = $db->delete($query);
   }
   ?>

   <div class="alert alert-warning">
   Remember this:<br>
   * Deleting a category also gets rid of all the posts under it, <br>
   * You can change the category of all posts under this one before deleting it</div>

  <form role="form" method="post" action="edit_category.php?id=<?php echo $id; ?>"><br>




  <div class="form-group">
    <label>Category</label>

   <input class="form-control" type="text" name="category" value="<?php echo $row['name'] ?>">

  </div>





<div>
  <input value="submit" name="submit" type="submit" class="btn btn-success">
  <a href="index.php" class="btn btn-default">cancel</a>
    <input value="delete" name="delete" type="submit" class="btn btn-danger">

</div>
</form>

<?php include "includes/footer.php";?>
<?php include "includes/header.php"; ?>

<?php 

if (isset($_POST['submit'])) {
     $title = mysqli_real_escape_string($db->link, $_POST['title']);
     $body = mysqli_real_escape_string($db->link, $_POST['body']);
     $category = mysqli_real_escape_string($db->link, $_POST['category']);
     $writer = mysqli_real_escape_string($db->link, $_POST['writer']); 
     $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

     if ($title == "" || $body == "" || $category == "" || $writer == "" || $tags == "") {
              
        $error = "<p class='lead text-center alert alert-danger'>Please fill out all required fields</p>";
        echo $error;
     } else{
      $query = "INSERT INTO posts (title, body, category, writer, tags)
        VALUES('$title','$body','$category','$writer ','$tags')";

        $insert_row = $db->insert($query);
     }
  }

?>

<?php
 $db = new Database(); 

$query = "SELECT * FROM categories";

$category = $db->select($query);

 ?>
<br>
  <form role="form" method="post" action="add_post.php"><br>
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" placeholder="Enter Title">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea cols="10" rows="10" name="body" class="form-control" placeholder="Enter Post Body"> </textarea>
  </div>
  
<div class="form-group">
    <label>Category</label>

    <select name="category" class="form-control">
      <?php while($row = $category->fetch_assoc()) : ?>

     <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
      
      <?php endwhile; ?>
    </select>
  </div>

   <div class="form-group">
    <label>Author</label>
    <input name="writer" type="text" class="form-control" placeholder="Enter Writer"><br>
  </div>

 <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" placeholder="Enter Tags"><br>
  </div>

  <div>
  <input value="submit" name="submit" type="submit" class="btn btn-success">
  <a href="index.php" class="btn btn-default">cancel</a>
</div>

</div>
</form>

<?php include "includes/footer.php";?>
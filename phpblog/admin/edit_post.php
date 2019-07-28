<?php include "includes/header.php"; ?>

<?php 

 $id = $_GET['id'];

?>

<?php
 $db = new Database(); 

$query = "SELECT * FROM posts WHERE id = ".$id;
       
$post= $db->select($query)->fetch_assoc();

$query = "SELECT * FROM categories";
       
$category= $db->select($query);


 ?>

 <?php if (isset($_POST['submit'])) {
     $title = mysqli_real_escape_string($db->link, $_POST['title']);
     $body = mysqli_real_escape_string($db->link, $_POST['body']);
     $category = mysqli_real_escape_string($db->link, $_POST['category']);
     $writer = mysqli_real_escape_string($db->link, $_POST['writer']); 
     $tags = mysqli_real_escape_string($db->link, $_POST['tags']);

     if ($title == "" || $body == "" || $category == "" || $writer == "" || $tags == "") {
              
        $error = "<p class='lead text-center alert alert-danger'>Please fill out all required fields</p>";
        echo $error;
     } else{
      $query = "UPDATE posts 
      SET
      title = '$title',
      body = '$body',
      category = '$category',
      writer = '$writer',
      tags = '$tags'
      WHERE id =".$id;

        $update_row = $db->update($query);
     }
  } ?>

  <?php 
   if (isset($_POST['delete'])) {
     $query = "DELETE FROM posts WHERE id = ".$id;
     $delete_row = $db->delete($query);
   }
   ?>

   <div class="alert alert-warning">
   Remember this:<br>
   * You can't retrive a post that you have deleted <br>
</div>
<br>
  <form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>"><br>
  <div class="form-group">
    <label>Post Title</label>
    <input name="title" type="text" class="form-control" value="<?php echo $post['title']; ?> ">
  </div>
  <div class="form-group">
    <label>Post Body</label>
    <textarea cols="10" rows="10" name="body" class="form-control"> <?php echo $post['body']; ?> </textarea>
  </div>
  
<div class="form-group">
    <label>Category</label>

    <select name="category" class="form-control">
      <?php while($row = $category->fetch_assoc()) : ?>
      <?php if ($row['id'] == $post['category']) {
        $selected = 'selected';
      } else {
        $selected = '';
      }
    
       ?>
     <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?> > <?php echo $row['name']; ?> </option>
      
      <?php endwhile; ?>
    </select>
  </div>

   <div class="form-group">
    <label>Author</label>
     <input name="writer" type="text" class="form-control" value="<?php echo $post['writer']; ?> ">
  </div>

 <div class="form-group">
    <label>Tags</label>
    <input name="tags" type="text" class="form-control" value="<?php echo $post['tags']; ?>"><br>
  </div>

  <div>
  <input value="submit" name="submit" type="submit" class="btn btn-success">
  <a href="index.php" class="btn btn-default">cancel</a>
    <input value="delete" name="delete" type="submit" class="btn btn-danger">
</div>

</div>
</form>

<?php include "includes/footer.php";?>
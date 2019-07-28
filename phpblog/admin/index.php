<?php include "includes/header.php"; ?>

<?php 

$query = "SELECT categories.name, posts.*
FROM categories
INNER JOIN posts
ON categories.id=posts.category ORDER BY posts.id desc";

$posts = $db->select($query);

$query = "SELECT * FROM categories";

$category = $db->select($query);
 ?>

 <br>

 <?php

 if (isset($_GET['msg'])) {
  $msg = $_GET['msg'];

     echo "<p class='lead text-center alert alert-success'>".$msg." </p>";
  } ?>


  <table id="top" class="table table-striped">
      <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
      </tr>
     
        <?php while ($row = $posts->fetch_assoc()) : ?> 
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><a class="link" href="edit_post.php?id=<?php echo $row['id'] ?>"><?php echo $row['title']; ?></a></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['writer']; ?></td>
        <td><?php echo formatDate($row['date']); ?></td>
        </tr>
      <?php endwhile; ?>
    
  </table>

  <table class="table table-striped">
      <tr>
        <th>Category ID</th>
        <th>Category Title</th>
      </tr>
   
     <?php while ( $row = $category->fetch_assoc()) : ?>
      <tr>
        <td><?php echo $row['id']; ?></td>
        <td><a class="link" href="edit_category.php?id=<?php echo $row['id'] ?>"><?php echo $row['name']; ?></a></td>
      </tr>
      <?php endwhile; ?>

  </table>

<?php include "includes/footer.php";?>
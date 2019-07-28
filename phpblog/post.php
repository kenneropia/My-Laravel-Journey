<?php include "config/config.php"; ?>
<?php include "libraries/database.php"; ?>
<?php include "includes/header.php"; ?>
<?php include "helpers/format_helper.php";?>


<?php
       $id = $_GET['id'];

 $db = new Database(); 


       $query = "SELECT * FROM posts WHERE id = ".$id;
       
       $post= $db->select($query)->fetch_assoc();

  
       $query = "SELECT * FROM categories";

       $categories = $db->select($query);


  
    

 ?>

          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $post['title']; ?></h2>
            <p><a href="#"><?php echo $post['writer']; ?></a></p>
            <p class="blog-post-meta"><?php echo formatDate($post['date']); ?></p>

           <?php echo $post['body']; ?>
          </div><!-- /.blog-post -->

      
<?php include "includes/footer.php"; ?>
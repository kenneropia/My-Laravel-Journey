<?php include "../config/config.php"; ?>
<?php include "../libraries/database.php"; ?>
<?php include "../helpers/format_helper.php";?>
<?php
       $db = new Database();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="../css/bootstrap.css">
     <link href="../css/custom.css" rel="stylesheet">
 
    <title><?php echo $site_title; ?></title>


  </head>

  <body>

    <div class="blog-masthead navbar-fixed-top">
      <div class="container">
        <nav class="blog-nav">
          <a class="blog-nav-item" href="index.php">Dashboard</a>
          <a class="blog-nav-item" href="add_post.php">Add Post</a>
          <a class="blog-nav-item" href="add_category.php">Add category</a>
          <a class="blog-nav-item pull-right" href="http://localhost/phpblog">Visit Blog</a>
        </nav>
      </div>
    </div> <br> <br>

    <div class="container">

      <div class="blog-header">
       <h2> Admin Section </h2>
       
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        </div><!-- /.blog-main -->
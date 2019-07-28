        </div><!-- /.blog-main -->

        <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <?php echo $site_decs; ?>
          </div>
          <div class="sidebar-module">
            <h4>Caegories</h4>
            <ol class="list-unstyled">
             <?php if($categories) : ?>
      <?php while($row = $categories->fetch_assoc()): ?>
                      <li class="badge"><a href="posts.php?category=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></li>
      <?php endwhile; ?>

<?php else : ?>
      <p>There are no posts yet</p>
<?php endif; ?>

            </ol>
          </div>
      
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->

    <footer class="blog-footer">
      <p>PHP Lovers Blog by @kenny &copy </p>
      <p> <a class="btn btn-default" href="#top">Back to top</a> </p>
    </footer>

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>

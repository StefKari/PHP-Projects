<div class="sidebar clear">
    <div class="samesidebar clear">
    	<h2>Categories</h2>
    		<ul>
          <?php
    	     $query = "SELECT * FROM category";
    	      $category  = $database->select($query);
    	       if ($category) {
    		         while ($result = $category->fetch_assoc()) {
          ?>
    	     <li><img src="images/icon-arrow.png" alt="*" height="10px" width="10px"/> <a href="posts.php?cat_id=<?php echo $result['id']; ?>"><?php echo $result['name']; ?></a></li>
          <?php } } else {
    			    echo "<li><b>Sorry! NO Category to show!</b></li>";
    		      }
          ?>
        </ul>
    </div>
    <div class="samesidebar clear">
    	<h2>Latest news</h2>
      	<?php
        $query = "SELECT * FROM post ORDER BY id DESC limit 5";
        $recentpost  = $database->select($query);
          if ($recentpost) {
      	     while ($result = $recentpost->fetch_assoc()) {
        ?>
      		<div class="popular clear">
        			<h3><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a><h3>
        			<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="Post image"/></a>
      			<small><?php echo $format->textShorten($result['body'], 100); ?></small>
    		  </div>
    	<?php } } else {
    		echo "<h3>NO Recent Posts..</h3>";
    	} ?>

    </div>
</div>

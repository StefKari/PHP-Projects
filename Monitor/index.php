<?php include "inc/header.php"; ?>
</div>
<div class="contentsection contemplete clear">
  <?php include "inc/sidebar.php"; ?>
    <div class="maincontent clear">
    <?php
    $per_page = 5;
    if(isset($_GET['page'])) {
      $page = $_GET['page'];
    }
    else {
      $page = 1;
    }
    $start_from = ($page - 1) * $per_page;

    $query = "SELECT * FROM post ORDER BY id DESC LIMIT $start_from, $per_page";
    $post = $database->select($query);
    if ($post) {
    	while ($result = $post->fetch_assoc()) {
    ?>
    <div class="samepost clear">
    	<h2><a href="post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></h2>
    	<h4><?php echo $format->formatData($result['date']); ?>, By <a href="#"><?php echo $result['author']; ?></a></h4>
    	<a href="post.php?id=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image']; ?>" alt="post image"></a>
    	<p>
    		<?php echo $format->textShorten($result['body']); ?> </p>
    	<div class="readmore clear">
    		<a href="post.php?id=<?php echo $result['id']; ?>">Read More</a>
    	</div>
    </div>
    <?php
      }// kraj while petlje

      // Pagination
      $query = "SELECT * FROM post";
      $result = $database->select($query);
      $total_rows = mysqli_num_rows($result);
      $total_pages = ceil($total_rows / $per_page);
      echo "<span class='pagination'><a href='index.php?page=1'>" . 'First Page' . "</a>";
      for ($i = 1; $i <= $total_pages; $i++) {
      	echo "<a href='index.php?page=" . $i . "'>" . $i . "</a>";
      }
      echo "<a href='index.php?page=$total_pages'>" . 'Last Page' . "</a></span>";
      // Kraj pagination -->

      } else {
      	header("Location:404.php");
      }
      ?>
  </div>
<?php
  include "inc/footer.php";
?>
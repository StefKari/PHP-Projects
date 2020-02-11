<?php
include "inc/header.php";

  if(!isset($_GET['pageid']) || $_GET['pageid'] == "") {
    header("Location: 404.php");
  }
  else {
    $id = $_GET['pageid'];
  }
?>
  <div class="contentsection contemplete clear">
  	<div class="maincontent clear">
          <?php
              $query = "SELECT * FROM page WHERE id = '$id'";
              $pages = $database->select($query);
              if($pages){
                  while($result = $pages->fetch_assoc()) { ?>
  		<div class="about">
  				<h2><?php echo $result['page_title']; ?></h2><br>
  				<?php echo $result['page_body']; ?>
  		</div>
          <?php
              }
            }
         ?>
  </div>
<?php
include "inc/sidebar.php";
include "inc/footer.php";
?>

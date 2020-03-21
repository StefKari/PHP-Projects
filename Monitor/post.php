<?php
include "inc/header.php";
include "inc/comment-add.php";


  /* Ucitavanje id posta i proverava da li postoji */
  if(!isset($_GET['id']) || $_GET['id'] == "") {
  	header("Location: 404.php");
  }
  else {
  	$id = $_GET['id'];
  }


  /* Brisanje komentara preko unetog id $comment_id */
  if (isset($_POST['comment_id'])) {
    $comment_id = mysqli_real_escape_string($database->link, $_POST['comment_id']);

    $comment_delete = "DELETE FROM comments WHERE id = '$comment_id' ";
    $del_comm = $database->delete($comment_delete);

      if ($del_comm) {
        echo true;
      }
      else {
        echo "";
      }
    }

?>
  <!-- Dodavanje sekcije post ispod su komentari -->
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<?php
  				$query = "SELECT * FROM post WHERE id='$id'";
  				$post = $database->select($query);
  				if($post){
  					while($result = $post->fetch_assoc()) {
				?>
  				<h2><?php echo $result['title']; ?></h2>
  				<h4><?php echo $format->formatData($result['date']); ?>, By <?php echo $result['author']; ?></h4>
  				<img src="admin/<?php echo $result['image']; ?>" alt="Post image">
  				<p><?php echo $result['body']; ?> </p>
  				</br>
  				<?php
  					   }
    				}
  				?>

      <!-- Komentari -->
      <div class="demo-container">
          <form action="" id="frmComment" method="POST">
            <?php
              if(isset($error)) {
                echo "<span style='color:#e00000;'>$error</span><br><br>";
              }
             ?>
            <div class="row">
              <label for="name">Name:</label>
              <input class="form-field" id="name" type="text" name="name">
            </div>
            <div class="row">
              <label for="message">Message:</label>
              <textarea class="form-field" id="message" name="message" rows="4"></textarea>
            </div>
            <div class="row">
              <button type="submit" name="submit" id="submit" class="btn-add-comment">Add Comment...</button>
            </div>
          </form>
          <?php

            $query = "SELECT * FROM comments WHERE post_id = '$postid' ORDER BY id DESC";
            $comment_id = $database->select($query);

          ?>
            <div id="response">
              <?php
              if($comment_id) {
                while($result = $comment_id->fetch_assoc()) {
              ?>
                <div id="comment<?php echo $result["id"];?>" class="comment-row">
                  <div class="comment-name"><i class='fas fa-user'></i> <?php echo $result["name"]; ?> <span class="comment-date"><?php echo $format->formatData($result["date"]);?></span></div>
                  <div class="comment-msg" id="msgdiv-<?php echo $result["id"];?>"><?php echo $result["message"];?></div>
                  <div class="delete" name="delete"
                    id="delete<?php echo $result["id"];?>"
                    onclick="deletecomment(<?php echo $result['id'];?>)">Delete</div>
                </div>
                <?php
                    }
                  }
                ?>
            </div>
          </div>
          <!-- Kraj Komentara -->
        </div>
      </div>

	<script type="text/javascript">

        function deletecomment(id) {
           if(confirm("Are you sure you want to delete this comment?")) {
                $.ajax({
                url: "post.php",
                type: "POST",
                data: 'comment_id='+id,
                success: function(data){
                    if (data) {
                      $("#comment"+id).remove();
                    }
                }
               });
            }
          }

  </script>


<?php
include "inc/sidebar.php";
include "inc/footer.php";
?>

<?php

if (isset($_POST['add'])) {

    $name = mysqli_real_escape_string($database->link, $_POST['name']);
    $message = mysqli_real_escape_string($database->link, $_POST['message']);

    $query= "INSERT INTO comments (name, message,post_id) VALUES ('$name', '$message','$postid')";
    $comment_id = $database->insert($query);


    $query = "SELECT * FROM comments WHERE id = '$comment_id' ";
    $comment_id = $database->select($query);
    if($comment_id) {
    while($result = $comment_id->fetch_assoc()) {

  ?>

    <div id="comment-<?php echo $result["id"];?>" class="comment-row">
  	<div class="comment-name"><?php echo $result["name"];?> <span class="comment-date"><?php echo $format->formatData($result['date']);?></span></div>
  	<div class="comment-msg" id="msgdiv"><?php echo $result["message"];?></div>

  	<div class="delete" name="delete" id="delete"
  		onclick="deletecomment(<?php echo $result["id"];?>)">Delete</div>
    </div>

<?php
      }
    }
  }
?>

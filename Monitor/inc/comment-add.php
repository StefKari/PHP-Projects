<?php

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($database->link, $_POST['name']);
    $message = mysqli_real_escape_string($database->link, $_POST['message']);
    $error = "";

    if(empty($name)) {
      $error = "Name must not be empty!";
    }
    else if(empty($message)) {
      $error = "Message must not be empty!";
    }
    else {

    $query= "INSERT INTO comments (name, message,post_id) VALUES ('$name', '$message','$postid')";
    $comment_id = $database->insert($query);

   }


  }
?>

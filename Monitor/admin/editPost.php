<?php
include "inc/header.php";
include "inc/sidebar.php";

    if(isset($_GET['id'])){
        $id = $_GET['id'];
    } else {
        // echo "<script>window.location.href = 'postlist.php';</script>";
    }
?>
<style>
table th, td {
  padding: 15px;
}
</style>
    <div class="main-box">
      <div class="box">
          <h2 style="margin: 10px 0 20px;">Update Post</h2>
          <div class="block">
          <?php
          if($_SERVER['REQUEST_METHOD'] == 'POST') {
              $title = mysqli_real_escape_string($database->link, $_POST['title']);
              $catid = mysqli_real_escape_string($database->link, $_POST['catid']);
              $author = mysqli_real_escape_string($database->link, $_POST['author']);
              $tags = mysqli_real_escape_string($database->link, $_POST['tags']);
              $body = mysqli_real_escape_string($database->link, $_POST['body']);

              $permited  = array('jpg', 'jpeg', 'png', 'gif');
              $file_name = $_FILES['image']['name'];
              $file_size = $_FILES['image']['size'];
              $file_temp = $_FILES['image']['tmp_name'];
              $div = explode('.', $file_name);
              $file_ext = strtolower(end($div));
              $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
              $uploaded_image = "upload/".$unique_image;

              if($title == "" || $catid == "" || $tags == "" || $body == "") {
                  echo "<span class='error'>Field must not be empty!</span>";
              }
              if(!empty($file_name)) {
                  if ($file_size >1048567) {
                          echo "<span class='error'>Image Size should be less then 1MB!
                      </span>";
                  }
                  elseif (in_array($file_ext, $permited) === false) {
                          echo "<span class='error'>You can upload only:-" . implode(', ', $permited)."</span>";
                  }
                  else {
                          move_uploaded_file($file_temp, $uploaded_image);
                              $query = "UPDATE post SET title = '$title', image = '$uploaded_image', author = '$author', body = '$body', tags = '$tags', category_id = '$catid' WHERE id = '$id'";
                              $update_post = $database->update($query);
                    if ($update_post) {
                        echo "<span class='success'>Post Updated Successfully.
                        </span>";
                    }
                    else {
                        echo "<span class='error'>Post Not Updated !</span>";
                    }
                  }
              }
              else {
                  $query = "UPDATE post SET title = '$title', author = '$author', body = '$body', tags = '$tags',category_id = '$catid' WHERE id = '$id'";
                  $update_post = $database->update($query);
                      if ($update_post) {
                          echo "<span class='success'>Post Updated Successfully.
                          </span>";
                      }
                      else {
                          echo "<span class='error'>Post Not Updated !</span>";
                      }
              }
            }
          ?>
          <form action="editPost.php" method="post" enctype="multipart/form-data">
              <table>
              <?php
                  $query = "SELECT * FROM post WHERE id='$id'";
                  $postedit = $database->select($query);
                  while($result = $postedit->fetch_assoc()) {
              ?>
                  <tr>
                      <td>
                          <label>Title</label>
                      </td>
                      <td>
                          <input type="text" value="<?php echo $result['title'];?>" name="title" class="medium">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Author</label>
                      </td>
                      <td>
                          <input type="text" value="<?php echo $result['author'];?>" name="author">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Category</label>
                      </td>
                      <td>
                      <select id="select" name="catid">
                      <?php
                      $catquery = "SELECT * FROM category";
                      $allcat = $database->select($catquery);
                      if($allcat){
                          while($result2 = $allcat->fetch_assoc()){
                              ?>
                              <option value="<?php echo $result2['id']; ?>"><?php echo $result2['name']; ?></option>
                      <?php
                          }
                        }
                      ?>

                      </select>
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Tags</label>
                      </td>
                      <td>
                          <input type="text" value="<?php echo $result['tags'];?>" id="tags" name="tags">
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label><img src="<?php echo $result['image']; ?>" height="100px" width="100px" alt=""></label>
                      </td>
                      <td>
                          <input type="file" name="image">
                      </td>
                  </tr>
                  <tr>
                      <td style="vertical-align: top; padding-top: 9px;">
                          <label>Content</label>
                      </td>
                      <td>
                          <textarea class="tinymce" name="body"><?php echo $result['body'];?></textarea>
                      </td>
                  </tr>
                  <tr>
                      <td></td>
                      <td>
                          <input type="submit" name="submit" Value="Save">
                      </td>
                  </tr>
                  <?php
                    }
                  ?>
              </table>
            </form>
          </div>
      </div>
    </div>

<?php include "inc/footer.php"; ?>

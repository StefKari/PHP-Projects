<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
        <div class="main-box">
            <div class="box">
                <h2 style="margin: 10px 0 20px;">Add New Post</h2>
                <div class="block">
                <?php
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $title = $format->validation($_POST['title']);
                    $catid = $format->validation($_POST['catid']);
                    $author = $format->validation($_POST['author']);
                    $tags = $format->validation($_POST['tags']);
                    $body = $format->validation($_POST['body']);

                    $permited  = array('jpg', 'jpeg', 'png', 'gif');
                    $file_name = $_FILES['image']['name'];
                    $file_size = $_FILES['image']['size'];
                    $file_temp = $_FILES['image']['tmp_name'];
                    $div = explode('.', $file_name);
                    $file_ext = strtolower(end($div));
                    $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                    $uploaded_image = "upload/".$unique_image;

                    if($title == "" || $catid == "" || $tags == "" || $body == "" || $file_name == "") {
                        echo "<span class='error'>Field must not be empty!</span>";
                    }
                    elseif (empty($file_name)) {
                        echo "<span class='error'>Please Select any Image !</span>";
                    }
                    elseif ($file_size >1048567) {
                            echo "<span class='error'>Image Size should be less then 1MB!
                        </span>";
                    }
                    elseif (in_array($file_ext, $permited) === false) {
                            echo "<span class='error'>You can upload only:-" . implode(', ', $permited)."</span>";
                    }
                    else {
                            move_uploaded_file($file_temp, $uploaded_image);
                                $query = "INSERT INTO post(title, image, author, body, tags, category_id) VALUES('$title', '$uploaded_image', '$author', '$body', '$tags','$catid')";
                                $inserted_post = $database->insert($query);
                       if ($inserted_post) {
                        echo "<span class='success'>Post Inserted Successfully.</span>";
                       }
                       else {
                        echo "<span class='error'>Post Not Inserted !</span>";
                       }
                    }
                }
                ?>
                <form action="addPost.php" method="post" enctype="multipart/form-data">
                    <table class="form">
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter Post Title..." name="title" class="medium">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Author</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Enter authoe name..." name="author">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                            <select id="select" name="catid">
                              <option>Select Category</option>
                              <?php
                              $catquery = "SELECT * FROM category";
                              $allcat = $database->select($catquery);
                              if($allcat) {
                                  while($result = $allcat->fetch_assoc()) {
                                      ?>
                                      <option value="<?php echo $result['id']; ?>"><?php echo $result['name']; ?></option>
                              <?php } } ?>
                            </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input type="text" id="tags" name="tags">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Upload Image</label>
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
                                <textarea  name="body"></textarea>
                            </td>
                        </tr>
						            <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save">
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>

<?php
include "inc/footer.php";
?>

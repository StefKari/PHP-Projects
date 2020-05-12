<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
<style>
table th, td {
  padding: 15px;
}
</style>
  <div class="main-box">
    <div class="box">
        <h2 style="margin: 10px 0 20px;">Add New Page</h2>
        <div class="block">
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $title = $format->validation($_POST['title']);
            $body = $format->validation($_POST['body']);

            if($title == "" || $body == ""){
                echo "<span class='error'>Field must not be empty!</span>";
            }
            else {
                $query = "INSERT INTO page(page_title, page_body) VALUES('$title', '$body')";
                $inserted_post = $database->insert($query);
                if ($inserted_post) {
                echo "<span class='success'>Page Inserted Successfully. </span>";
                }
                else {
                echo "<span class='error'>Page Not Inserted !</span>";
                }
            }
        }
        ?>
        <form action="addPage.php" method="post">
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
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce2" name="body" height="400px" width="400px"></textarea>
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

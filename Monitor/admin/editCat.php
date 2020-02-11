<?php
include "inc/header.php";
include "inc/sidebar.php";

  if(!isset($_GET['catid']) || $_GET['catid'] == "") {
      echo "<script>window.location = 'catlist.php';</script>";
  }
  else {
      $catid = $_GET['catid'];
  }
?>
<style>
table th, td {
  padding: 15px;
}
</style>
<div class="main-box">
    <div class="box">
        <h2 style="margin: 10px 0 20px;">Edit Category</h2>
        <div class="block">
            <form method="post" action="">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $name = $_POST['name'];
                        $name = mysqli_real_escape_string($database->link, $name);
                        if(empty($name)) {
                            echo "<span class='error'>Field must not be empty!</span>";
                        }
                        else {
                            $query = "UPDATE category SET name ='$name' WHERE id = '$catid'";
                            $catEdit = $database->update($query);
                            if($catEdit) {
                                echo "<script>window.location = 'catList.php';</script>";
                            }
                            else {
                                echo "<span class='error'>Opps! Category not edited.</span>";
                            }
                        }
                        }

                    $query = "SELECT * FROM category WHERE id='$catid' ORDER BY id desc";
                    $category = $database->select($query);
                    while($result = $category->fetch_assoc()){
                ?>
            <table>
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="<?php echo $result['name']; ?>" class="medium">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="submit" Value="Save">
                    </td>
                </tr>
            </table>
            </form>
          <?php
            }
          ?>
        </div>
    </div>
</div>
<?php
include "inc/footer.php";
?>

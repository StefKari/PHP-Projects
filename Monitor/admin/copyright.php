<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
<div class="main-box">
            <div class="box">
                <h2 style="margin: 10px 0 20px;">Update Copyright Text</h2>
                <div class="block">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
                        $note = $format->validation($_POST['copyright']);
                        $note = mysqli_real_escape_string($database->link, $note);

                        if($note !== "") {
                                $query = "UPDATE copyright SET note = '$note' WHERE id='1'";
                                $update_settings = $database->update($query);
                                    if ($update_settings) {
                                        echo "<script>alert('Settings Updated Successfully.')</script>";
                                    }
                                    else {
                                        echo "<span class='error'>Settings Not Updated !</span>";
                                  }
                        }
                        else {
                            echo "<span class='error'>Settings Not Updated !</span>";
                        }
                  }
                 ?>
                <form action="copyright.php" method="post">
                    <table class="form">
                    <?php
                        $query = "SELECT * FROM copyright WHERE id = '1'";
                        $copyright = $database->select($query);
                        if($copyright){
                            while($result = $copyright->fetch_assoc()){
                      ?>
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['note']; ?>" name="copyright" class="large">
                            </td>
                        </tr>
                      <?php
                          }
                       }
                       ?>
                        <tr>
                            <td>
                                <input type="submit" name="submit" Value="Update">
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

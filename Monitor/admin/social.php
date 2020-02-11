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
        <h2 style="margin: 10px 0 20px;">Update Social Media</h2>
  <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $facebook = $format->validation($_POST['facebook']);
        $instagram = $format->validation($_POST['instagram']);
        $twitter = $format->validation($_POST['twitter']);
        $linkedin = $format->validation($_POST['linkedin']);
        $googleplus = $format->validation($_POST['googleplus']);

        $title = mysqli_real_escape_string($database->link, $facebook);
        $title = mysqli_real_escape_string($database->link, $instagram);
        $title = mysqli_real_escape_string($database->link, $twitter);
        $title = mysqli_real_escape_string($database->link, $linkedin);
        $slogan = mysqli_real_escape_string($database->link, $googleplus);

        if($facebook !== "" ||  $instagram !== "" || $twitter !== "" || $linkedin !== "" || $googleplus !== "") {
                $query = "UPDATE social SET facebook = '$facebook', instagram = '$instagram', twitter = '$twitter', linkedin = '$linkedin', googleplus = '$googleplus' WHERE id='1'";
                $update_settings = $database->update($query);
                    if ($update_settings) {
                        echo "<span class='success'>Settings Updated Successfully.
                            </span>";
                    }
                    else {
                        echo "<span class='error'>Settings Not Updated !</span>";
                    }
                }
                else {
                    echo "<span class='error'>Settings Not Updated !</span>";
                }
            }

        $query = "SELECT * FROM social WHERE id = '1'";
        $social = $database->select($query);
        if($social){
            while($result = $social->fetch_assoc()){
    ?>
        <div class="block">
            <form action="social.php" method="post">
                <table>
                    <tr>
                        <td>
                            <label>Facebook</label>
                        </td>
                        <td>
                            <input type="text" name="facebook" value="<?php echo $result['facebook'];?>" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Instagram</label>
                        </td>
                        <td>
                            <input type="text" name="instagram" value="<?php echo $result['instagram'];?>" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Twitter</label>
                        </td>
                        <td>
                            <input type="text" name="twitter" value="<?php echo $result['twitter'];?>" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>LinkedIn</label>
                        </td>
                        <td>
                            <input type="text" name="linkedin" value="<?php echo $result['linkedin'];?>" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Google Plus</label>
                        </td>
                        <td>
                            <input type="text" name="googleplus" value="<?php echo $result['google'];?>" class="medium">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Update">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
            }
          }
        ?>
    </div>
</div>
<?php
include "inc/footer.php";
 ?>

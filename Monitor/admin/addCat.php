<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
<div class="main-box">
    <div class="box">
        <h2 style="margin: 10px 0 20px;">Add New Category</h2>
        <div class="block">
            <form method="post" action="">
                <?php
                    if($_SERVER['REQUEST_METHOD'] == 'POST') {
                        $name = $_POST['name'];
                        $name = mysqli_real_escape_string($database->link, $name);
                        if(empty($name)) {
                            echo "<span class='error'>Field must not be empty!</span>";
                        }
                        else {
                            $query = "INSERT INTO category(name) VALUES('$name')";
                            $catInsert = $database->insert($query);
                            if($catInsert) {
                                echo "<span class='success'>Successfully inserted categories!</span>";
                            }
                            else {
                                echo "<span class='error'>Opps! Categories not added.</span>";
                            }
                        }
                    }
                ?>
            <table class="form">
                <tr>
                    <td>
                        <input type="text" name="name" placeholder="Enter Category Name..." class="medium">
                    </td>
                </tr>
                <tr>
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

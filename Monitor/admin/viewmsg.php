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
                <h2 style="margin: 10px 0 20px;">View message</h2>
                <div class="block">
                <?php
                  if(!isset($_GET['delid']) || $_GET['delid'] == ""){
                  } else {
                      $delid = $_GET['delid'];
                      $query = "DELETE FROM contact WHERE id='$delid'";
                      $delete = $database->delete($query);
                      if($delete) {
                          echo "<script>window.location = 'inbox.php?showmsg=1';</script>";
                      }
                      else {
                          echo "Problem in deleting this message!";
                      }
                  }


                  if(!isset($_GET['msgid']) || $_GET['msgid'] == ""){
                      echo "<script>window.location = 'inbox.php';</script>";
                  } else {
                      $msgid = $_GET['msgid'];
                  }
                  ?>
                <form action="" method="post">
                  <table>
                  <?php
                  $query = "SELECT * FROM contact WHERE id='$msgid' ORDER BY id desc";
                  $category = $database->select($query);
                  while($result = $category->fetch_assoc()) {
                      ?>
                          <tr>
                              <td>
                                  <label>Name: </label>
                              </td>
                              <td>
                                  <p><?php echo $result['first_name']." ".$result['last_name']; ?></p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label>Email: </label>
                              </td>
                              <td>
                                  <p><?php echo $result['email']; ?></p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label>Date: </label>
                              </td>
                              <td>
                                  <p><?php echo $format->formatData($result['date']); ?></p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label>Message: </label>
                              </td>
                              <td>
                                  <p><?php echo $result['body']; ?></p>
                              </td>
                          </tr>
                          <tr>
                              <td>
                                  <label>Delete: </label>
                              </td>
                              <td>
                                  <p align="right"><a href="?delid=<?php echo $result['id']; ?>">Delete This Message</a></p>
                              </td>
                          </tr>
                  <?php } ?>
                      </table>
                    </form>
                </div>
            </div>
        </div>

<?php
include "inc/footer.php";
?>

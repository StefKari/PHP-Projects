<?php
include "inc/header.php";
include "inc/sidebar.php";
?>
<style>
body {
  background-color: #f0f0c5;
}
</style>
        <div class="main-box clear">
            <div class="box-postlist">
                <h2>Post List</h2>
                <div class="block">
            				<?php
                        if(isset($_GET['del'])) {
                					$delid = $_GET['del'];
                					$delPost = "DELETE FROM post WHERE id = '$delid'";
                					$deldata = $database->delete($delPost);
                					if($deldata) {
                						echo "<span class='success'>Successfully Post deleted!</span>
                            <script>
                							var timer = setTimeout(function() {
                								window.location='postList.php'
                							}, 3000);
                						</script>";
                					}
                          else {
                						echo "<span class='error'>Opps!Post not deleted.</span>";
                					}
              				}
                    ?>
                <table>
        					<thead>
        						<tr>
        							<th width="5%">No. </th>
        							<th width="20%">Post Title</th>
        							<th width="15%">Description</th>
        							<th width="10$">Image</th>
        							<th width="10%">Tags</th>
        							<th width="10$">Author</th>
        							<th width="10%">Date</th>
        							<th width="05%">Action</th>
                      <th width="10%">Category</th>

        						</tr>
        					</thead>
        					<tbody>
                    <?php
            					$query = "SELECT post.*, category.name FROM post INNER JOIN category ON post.category_id = category.id ORDER BY post.id DESC";
            					$post = $database->select($query);
            					if($post){
            						while($result = $post->fetch_assoc()){
        					   ?>
        						<tr>
        							<td><?php echo $result['id']; ?></td>
        							<td><a href="../post.php?id=<?php echo $result['id']; ?>"><?php echo $result['title']; ?></a></td>
        							<td><p><?php echo $format->textShorten($result['body'], 80); ?></p></td>
        							<td><?php echo $result['name']; ?></td>
        							<td><img src="../admin/<?php echo $result['image']; ?>" height="40px" width="60px" alt="preview"></td>
        							<td><?php echo $result['tags']; ?></td>
        							<td><?php echo $result['author']; ?></td>
        							<td><?php echo $format->formatData($result['date']); ?></td>
        							<td><a href="editPost.php?id=<?php echo $result['id']; ?>">Edit</a> | <a onlick="return confirm('Are you sure want to delete?'); " href="?del=<?php echo $result['id']; ?>">Delete</a></td>
        						</tr>
        						<?php
                        }
                      }
                    ?>
        					</tbody>
        				</table>

               </div>
            </div>
        </div>

	<?php include "inc/footer.php"; ?>

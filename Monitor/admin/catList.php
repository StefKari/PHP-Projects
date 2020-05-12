<?php
include "inc/header.php";
include "inc/sidebar.php";
?>

  <div class="main-box">
    	<div class="box">
      	<?php if(isset($_GET['delcat'])) {
            		$delid = $_GET['delcat'];
            		$delCat = "DELETE FROM category WHERE id = '$delid'";
            		$deldata = $database->delete($delCat);
            		if($deldata) {
            			echo "<span class='success'>Successfully category deleted!</span>";
            		}
                else {
            			echo "<span class='error'>Opps! not deleted.</span>";
            		}
      	     }
        ?>
      		<h2 style="margin: 10px 0 20px;">Category List</h2>
      		<div class="block">
      			<table>
        			<thead>
        				<tr>
        					<th width="8%">Serial No.</th>
        					<th width="10%">Category Name</th>
        					<th width="8%">Action</th>
        				</tr>
        			</thead>
        			<tbody>
        				<?php
        					$query = "SELECT * FROM category ORDER BY id DESC";
        					$category = $database->select($query);
        					if($category) {
        						$i = 0;
        						while($result = $category->fetch_assoc()){
        							$i++;
        			   ?>
        				<tr>
        					<td><?php echo $i; ?></td>
        					<td><?php echo $result['name']; ?></td>
        					<td><a href="editCat.php?catid=<?php echo $result['id']; ?>">Edit</a> | <a onlick="return confirm('Are you sure want to delete?');" href="?delcat=<?php echo $result['id']; ?>">Delete</a></td>
        				</tr>
        				<?php }
        					}
        					?>
        			</tbody>
      		</table>
      		</div>
    	</div>
  </div>




<?php
include "inc/footer.php";
?>

<?php
include "inc/header.php";
include "inc/sidebar.php";


  if(!isset($_GET['seen']) || $_GET['seen'] == "") {
  }
  else {
  	$seen = $_GET['seen'];
  	$query = "UPDATE contact SET status = '1' WHERE id = '$seen'";
  	$seen = $database->update($query);
  }
?>
<style>
body {
  background-color: #f0f0c5;
}
</style>
      <div class="main-box">
        		<div class="box-inbox">
        				<h2 style="margin: 20px 0 20px;">Inbox</h2>
        				<div class="block">
        					<table>
        						<?php
          						if(!isset($_GET['showmsg']) || $_GET['showmsg'] == "") {
                      }
                      else {
          							echo "<span class='success'>Message Deleted Successfully!</span>";
          						}
        						?>
                  	<thead>
                    		<tr>
                    			<th  width="5%">Serial No.</th>
                    			<th width="5%">Name</th>
                    			<th width="5%">Mail</th>
                    			<th width="5%">Message</th>
                    			<th width="5%">Date</th>
                    			<th width="5%">Action</th>
                    		</tr>
                  	</thead>
                  	<tbody>
                <?php
                        // cita poruke iz baze koje nisu vidjene tj seen
                    		$query = "SELECT * FROM contact WHERE status = '0' ORDER BY id DESC";
                    		$category = $database->select($query);
                    		if($category) {
                    			$i = 0;
                    			while($result = $category->fetch_assoc()){
                    				$i++;
                ?>
              		<tr>
              			<td><?php echo $result['id']; ?></td>
              			<td><?php echo $result['first_name']; ?> <?php echo $result['last_name']; ?></td>
              			<td><?php echo $result['email']; ?></td>
              			<td><?php echo $format->textShorten($result['body']); ?></td>
              			<td><?php echo $format->formatData($result['date']); ?></td>
              			<td><a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> | <a href="?seen=<?php echo $result['id']; ?>">Seen</a></td>
              		</tr>
                <?php
                    }
                  }
                ?>
        	       </tbody>
               </table>
             </div>
           </div>
           <br>
           <div class="box-inbox">
        				<h2 style="margin: 10px 0 20px;">Seen Inbox</h2>
        				<div class="block">
        			<table class="data display datatable" id="example">
            		<tr>
            			<th width="5%">Serial No.</th>
            			<th  width="5%">Name</th>
            			<th  width="5%">Mail</th>
            			<th width="5%">Message</th>
            			<th width="5%">Date</th>
            		</tr>
            	</thead>
            	<tbody>
                <?php
                      // cita poruke iz baze koje su vidjene tj nisu seen
                  		$query = "SELECT * FROM contact WHERE status = '1' ORDER BY id DESC";
                  		$category = $database->select($query);
                  		if($category) {
                  			$i = 0;
                  			while($result = $category->fetch_assoc()) {
                  				$i++;
                ?>
          		<tr>
          			<td><?php echo $result['id']; ?></td>
          			<td><?php echo $result['first_name']; ?> <?php echo $result['last_name']; ?></td>
          			<td><?php echo $result['email']; ?></td>
          			<td><?php echo $format->textShorten($result['body']); ?></td>
          			<td><?php echo $format->formatData($result['date']); ?></td>
          		</tr>
            <?php } } ?>
        	 </tbody>
         </table>
        </div>
      </div>
    </div>


<?php
 include "inc/footer.php";
 ?>

<?php
include "inc/header.php";

		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			$fname = $format->validation($_POST['firstname']);
			$lname = $format->validation($_POST['lastname']);
			$email = $format->validation($_POST['email']);
			$body  = $format->validation($_POST['body']);

			$fname = mysqli_real_escape_string($database->link, $fname);
			$lname = mysqli_real_escape_string($database->link, $lname);
			$email = mysqli_real_escape_string($database->link, $email);
			$body  = mysqli_real_escape_string($database->link, $body);
			$error = "";

			if(empty($fname)) {
				$error = "First name must not be empty!";
				}
		    elseif(empty($lname)) {
					$error = "Last name must not empty!";
				}
		    elseif(empty($email)) {
					$error = "Email must not be empty!";
				}
		    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$error = "Email is not validate!";
				}
		    elseif(empty($body)) {
					$error = "Message field must not be empty!!";
				}
		    else {
					$query = "INSERT INTO contact(first_name, last_name, email, body) VALUES('$fname','$lname','$email','$body')";
					$sent_msg = $database->insert($query);
					if($sent_msg) {
						$msg = "Message succesfully send!";
					}
		      else {
						$error = "Message not send!";
					}
				}
		}
 ?>
	<div class="contentsection contemplete clear">
  		<div class="maincontent clear">
  			<div class="about">
  				<h2>Contact us</h2>
  				<?php
    				if(isset($error)) {
    					echo "<span style='color:#e00000;'>$error</span>";
    				}
    				if(isset($msg)){
    					echo "<span style='color:#34b800;'>$msg</span>";
							header('refresh: 6; contact.php');
    				}
  				?>
  			<form method ="post" action="contact.php">
  				<table>
  				<tr>
  					<td>Your First Name:</td>
  					<td>
  					<input type="text" name="firstname" placeholder="Enter first name">
  					</td>
  				</tr>
  				<tr>
  					<td>Your Last Name:</td>
  					<td>
  					<input type="text" name="lastname" placeholder="Enter Last name">
  					</td>
  				</tr>
  				<tr>
  					<td>Your Email Address:</td>
  					<td>
  					<input type="text" name="email" placeholder="Enter Email Address">
  					</td>
  				</tr>
  				<tr>
  					<td>Your Message:</td>
  					<td>
  					<textarea name="body"></textarea>
  					</td>
  				</tr>
  				<tr>
  					<td></td>
  					<td>
  					<input type="submit" name="submit" value="Submit">
  					</td>
  				</tr>
  		</table>
  	<form>
   </div>
  </div>

<?php
include "inc/sidebar.php";
include "inc/footer.php";
?>

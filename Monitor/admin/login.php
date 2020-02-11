<?php
include "../classes/session.php";
  Session::checkLogin();
include "../config/databaseConnect.php";
include "../classes/database.php";
include "../classes/format.php";

  $database = new Database();
  $format = new Format();
?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>LogIn</title>
    <link rel="stylesheet" type="text/css" href="css/admin.css" media="screen">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    <!--  jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <!-- Boostrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    		<?php
    		if($_SERVER['REQUEST_METHOD'] == 'POST'){
    			$username = $format->validation($_POST['username']); // povratno username i validacija
    			$password = $format->validation(($_POST['password'])); // povratno password i validacija

    			$username = mysqli_real_escape_string($database->link, $username); // proverava konekciju
    			$password = mysqli_real_escape_string($database->link, $password);

    			$query = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    			$result = $database->select($query);
      			if($result != false) {
      				$value = mysqli_fetch_assoc($result); // hvata tj uzima podatke iz baze
      				$row   = mysqli_num_rows($result); // uzima broj redova iz baze
      				$username = $value['username'];
      				$userid = $value['id'];
      				if($row > 0) { //initilizing session as global
      					Session::set("login", true);
      					$_SESSION['username'] = $username;
      					$_SESSION['userid'] = $userid;
      					// Session::set("username",  $username);
      					// Session::set("userid",  $userid);
      					header("Location:index.php");
      				}
              else {
      					echo "<script>alert('User NOT FOUND!')</script>";
      				}
      			}
            else {
      				echo "<script>alert('Username and Password not matched!')</script>";
      			}

      		}
    		?>

        <div class="login-form">
              <form data-aos="flip-down" method="POST">
                  <h4>Fill all fields</h4>
                  <div>
                      <i class="fas fa-user"></i><input type="text" id="username" name="username" placeholder="Username..." required><br>
                      <i class="fas fa-unlock-alt"></i><input type="password" id="password" name="password" placeholder="Password..." required>
                      <button id="dugme">Login</button>
                  </div>
              </form>
          </div>



</body>
</html>

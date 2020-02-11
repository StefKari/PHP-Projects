<?php
include '../classes/session.php';
  Session::checkSession();
include "../config/databaseConnect.php";
include "../classes/database.php";
include "../classes/format.php";

$database = new Database(); //instanciranje objekta
$format = new Format(); // instanciranje objekta


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard</title>
    <!-- Moj CSS -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
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
    <header id="header">
      <nav class="navbar navbar  navbar-dark ">
                <ul calss="omot1">
                  <a class="navbar-brand" href="#"><i class="fas fa-signal"></i> Dashboard | Monitor Association of Citizens</a>
                </ul>
                      <?php
                          // startovanje sesije tj logovanje
                           if(isset($_SESSION)) {
                             $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
                             $id = $_SESSION['userid'];
                           }
                           else {
                             $usernam = '';
                             $id = '';
                           }

                           // unistavanje sesije odnosno logout
                          if(isset($_GET['action']) && $_GET['action'] == "logout"){
                            Session::destroy();
                            }

                        ?>  <ul class="omot2">
                                <a class="navbar-brand" >Hello <span style="color:#3c420f;"><i class="fas fa-user"></i> <?php echo $username; ?></span></a>
                                <a class="navbar-brand" href="?action=logout">Logout</a>
                            </ul>
                    </nav>
            <div class="naslov clear">
                  <ul>
                      <li class="nav-item"><a class="nav-link" href="index.php"><i class="fas fa-user-shield"></i> Dashboard</a></li>
              				<li class="nav-item">
                              <a class="nav-link" href="inbox.php"><i class="fas fa-inbox"></i> Inbox
                              <?php
                              // citanje iz baze gde su poruke sa statusom nula odnosno nisu procitane tj nije seen
                              $query = "SELECT * FROM contact WHERE status = '0'";
                              $msg = $database->select($query);
                              if($msg){
                                  echo "(".$count = mysqli_num_rows($msg).")";
                              } else {
                                  $count = "";
                              }
                              ?>
                              </a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/Monitor/index.php"><i class="far fa-square"></i> Visit Website</a></li>
                  </ul>
            </div>
    </header>

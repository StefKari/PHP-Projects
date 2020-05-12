<?php
include "config/databaseConnect.php";
include "classes/database.php";
include "classes/session.php";
include "classes/format.php";

// instanciranje objekta
$database = new Database();
$format = new Format();
  Session::init();
  if(Session::get("login") == true) {
    $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
    $id = $_SESSION['userid'];
  }
  else {
    $username = '';
    $id = '';
  }

?>
<!DOCTYPE html>
<html>
  <head>
      <meta charset="utf-8">
          <?php
            // Cita naslov page iz baze po id
          	if(isset($_GET['pageid'])) {
          		$pageid = $_GET['pageid'];
          	  $query = "SELECT * FROM page WHERE id = $pageid";
          	  $pages = $database->select($query);
              	if($pages) {
              		while($result = $pages->fetch_assoc()) { ?>
              				<title><?php echo $result['page_title']." - ".TITLE; ?></title>
          <?php } } }
            // Cita naslov posta iz baze po id
            elseif (isset($_GET['id'])) {
          		$postid = $_GET['id'];
          	  $query = "SELECT * FROM post WHERE id = $postid";
          	  $posts = $database->select($query);
              	if($posts) {
              		while($result=$posts->fetch_assoc()) { ?>
              				<title><?php echo ucwords($result['title'])." - ".TITLE; ?></title>
          <?php } } } else { ?>
      	  <title><?php echo $format->title(); ?> - <?php echo TITLE; ?></title>
        	<?php } ?>
          <meta name="language" content="English">
	        <meta name="description" content="It is a website about Association of Citizens">
	        <meta name="keywords" content="Monitor,Association of Citizens,">
	        <meta name="author" content="Stef Kari">
          <!-- Moj CSS za korisnike -->
          <link href="css/style.css" rel="stylesheet" type="text/css">
          <!-- Link za awesome -->
          <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
          <!-- Ucitavanje jquery -->
          <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
          <!-- Bootstrap -->
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
      <div class="headersection templete clear">
        <a href="index.php">
          <div class="logo">
              <?php
              $query = "SELECT * FROM settings WHERE id = '1'";
              $blogsettings = $database->select($query);
              if($blogsettings) {
                while($result = $blogsettings->fetch_assoc()) {
              ?>
              <img src="admin/<?php echo $result['logo'];?>" alt="Logo pictures">
              <h2><?php echo $result['title'];?></h2>
              <p><?php echo $result['slogan'];?></p>
              <?php } } ?>
            </div>
          </a>
          <div class="social clear">
            <div class="icon clear">
              <a href="https://www.facebook.com/MONITORUG/"><i class="fab fa-facebook-f"></i></a>
              <a href="https://www.instagram.com/monitorcso/"><i class="fab fa-instagram"></i></a>
              <a href="https://www.linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
            </div>
            <div class="searchbtn clear">
              <form action="search.php" method="get">
                <input type="text" name="search" placeholder="Search...">
                <input type="submit" name="submit" value="Search">
              </form>
            </div>
          </div>
        </div>
        <div class="navsection templete">
          <ul>
            <?php
            $path = $_SERVER['SCRIPT_FILENAME'];
            $currentpage = basename($path, '.php');
            ?>
            <li><a <?php if($currentpage == 'index'){echo 'id = "active"';} ?> href="index.php">Home</a></li>
            <?php
            $query = "SELECT * FROM page";
            $pages = $database->select($query);
            if($pages) {
              while($result = $pages->fetch_assoc()) { ?>
                <li><a <?php if(isset($_GET['pageid']) && $_GET['pageid'] == $result['id']){echo 'id = "active"';} ?> href='page.php?pageid=<?php echo $result['id']; ?>'><?php echo $result['page_title']; ?></a></li>
            <?php } } ?>
            <li><a <?php if($currentpage == 'contact'){echo 'id = "active"';} ?> href="contact.php">Contact</a></li>
            <?php
              if(Session::get("login")==true){
                echo "<li align='right'><a href='http://blog.admin'><i class='fas fa-user'></i> $username Panel</a></li>";
              }
              else {
                echo "";
              }
            ?>
          </ul>
        </div>

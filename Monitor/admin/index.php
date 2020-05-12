<?php
 include "inc/header.php";
?>
<div class="main-box">
    <?php
    include "inc/sidebar.php";
     if(isset($_SESSION)) {
       $username = isset($_SESSION['username']) ? $_SESSION['username'] : "";
       $id = $_SESSION['userid'];
     }
     else {
       $usernam = '';
       $id = '';
     }
    ?>

    <div class="box">
        <h2> Dashboard</h2>
        <div class="block">
            <p>Welcome to Admin Panel   <span style="color:#5e690e;font-weight:700;font-size:1.2em;"><i class="fas fa-user"></i> <?php echo  $username ?></span></p>
        </div>
    </div>
</div>

<?php
include "inc/footer.php";
?>

<?php
include "inc/header.php";
?>
  <div class="contentsection contemplete clear">
    <div class="maincontent clear">
      <div class="about">
        <h2><?php echo $result['page_title']; ?></h2>
        <?php echo $result['page_body']?>
      </div>
  </div>
<?php
include "inc/sidebar.php";
include "inc/footer.php";
?>

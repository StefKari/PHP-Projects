

</div>

	<div class="footersection templete clear">
  	  <div class="footermenu clear">
    		<ul>
    			<li><a href="#">Home</a></li>
    			<li><a href="http://localhost/Monitor/page.php?pageid=1">About</a></li>
    			<li><a href="http://localhost/Monitor/page.php?pageid=2">Privacy</a></li>
					<li><a href="http://localhost/Monitor/contact.php">Contact</a></li>
    		</ul>
  		</div>
  		<?php
          $query = "SELECT * FROM copyright WHERE id = '1'";
          $copyright = $database->select($query);
          if($copyright){
              while($result = $copyright->fetch_assoc()){
        ?>
  		<p>&copy; <?php echo $result['note']; ?></p>
  						  <?php } } ?>
	</div>
	<div class="fixedicon clear">
    	<?php
            $query = "SELECT * FROM social WHERE id = '1'";
            $social = $database->select($query);
            if($social){
                while($result = $social->fetch_assoc()){
            ?>
    		<a href="https://www.facebook.com/MONITORUG/<?php echo $result['facebook']; ?>"><img src="images/fb.png" alt="Facebook"/></a>
        <a href="https://www.instagram.com/monitorcso/<?php echo $result['instagram']; ?>"><img src="images/insta.png" alt="Instagram"/></a>
    		<a href="https://twitter.com/login?lang=en<?php echo $result['twitter']; ?>"><img src="images/tw.png" alt="Twitter"/></a>
    		<a href="https://www.linkedin.com/<?php echo $result['linkedin']; ?>"><img src="images/in.png" alt="LinkedIn"/></a>
    		<a href="https://www.google.com/chrome/<?php echo $result['google']; ?>"><img src="images/gl.png" alt="GooglePlus"/></a>
    		<?php } } ?>
	</div>

</body>
</html>

<?php

class Format {

		// formatiranje datuma u lokalno vreme
	 public function formatData($date) {
		 return date('F j, Y, g:i:a', strtotime($date));
	 }

	 // funkcija za skracivanje teksta.....i to kod sidebara i kod postova
	 public function textShorten($text, $limit = 360) {
		 $text = $text . " ";
		 $text = substr($text, 0, $limit);
		 $text = substr($text, 0, strrpos($text, ' '));
		 $text = $text . "...";

		 return $text;
	 }

	 // validacija prilikom ubacivanja podataka u bazu
	 public function validation($data) {
		 $data = trim($data);
	 	 $data = stripcslashes($data);
	 	 $data = htmlspecialchars($data);

		 return $data;
	 }

	 // sredjivanje naslova pages...posta...
	 public function title() {
		 $path = $_SERVER['SCRIPT_FILENAME'];
		 $title = basename($path, '.php');
		 $title = str_replace('_',' ',$title);
		 $title = str_replace('-',' ',$title);
		 if($title == 'index') {
			 $title = 'home';
		 }
		 elseif ($title == 'contact') {
		 	 $title = 'contact';
		 }
		 return $title = ucwords($title); // stavlja prvi karakter kao veliki
	 }
}

 ?>

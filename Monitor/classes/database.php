<?php
class Database {

	public $host = DB_HOST;
	public $username = DB_USERNAME;
	public $password = DB_PASSWORD;
	public $dbname = DB_NAME;

	public $link;
	public $error;

	// vracanje konekcije
	public function __construct() {
		$this->connectDB();
	}

		// funkcija za konekciju na bazu
	private function connectDB() {
		$this->link = new mysqli($this->host, $this->username, $this->password, $this->dbname);
		if(!$this->link) {
			$this->error ="Connection fail".$this->link->connect_error;
			return false;
	}
 }

	// funkcija za select podataka iz baze
	public function select($query) {
		$result = $this->link->query($query) or die($this->link->error.__LINE__);
		$row_count = $result->num_rows;
		if($result->num_rows > 0){
			return $result;
		}
		else {
			return false;
		}
	}


	// funkcija za insert podataka u bazu
	public function insert($query) {
		$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($insert_row) {
			return $insert_row;
		}
		else {
			return false;
		}
  }

    // funkcija za update podataka u bazi
  	public function update($query) {
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($update_row) {
				return $update_row;
			}
			else {
				return false;
			}
  }

  // funkcija za delete podataka u bazi
   public function delete($query) {
		$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
		if($delete_row) {
			return $delete_row;
		}
		else {
			return false;
		}
  }



}

?>

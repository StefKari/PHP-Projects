<?php
class Session {

  // startuje sesiju
  public static function init() {
    session_start();
  }

  // setuje je se sesija
  public static function set($key, $val) {
    $_SESSION['key'] = $val;
  }

  // proverava se da li je setovana sesija
  public static function get($key) {
    if(isset($_SESSION['key'])) {
      return $_SESSION['key'];
    }
    else {
      return false;
    }
  }

  // provera da li je user ulogovan ako nije sesija se ponistava ili nije zapoceta i user se vraca na index.php
  public static function checkSession() {
    self::init();
    if(self::get("login") == false) {
      self::destroy();
      header("Location: login.php");
    }
  }

  // startuje se sesija ukoliko je se user uloguje uspesno
  public static function checkLogin() {
    self::init();
    if(self::get("Login") == true) {
      header("Loacation: index.php");
    }
  }

  // unistavanje sesije
  public static function destroy() {
    session_destroy();
    header("Loacation: login.php");
  }

}



?>

<!--login và logout tài khoản user-->

<?php session_start(); require_once("db.php");?>
<?php
class atz extends DB{

	public function __construct() {
		
	}
	
	function check_login(){
		if(!isset($_SESSION['user'])){
			header("location:login.php");
		}
	}

	function logout(){
		
		if(isset($_GET['logout'])){
			if(isset($_SESSION['user']) && !empty($_SESSION['user'])){	
				unset($_SESSION['user']);
				header("location:login.php");
			}	
		}
		
	}
}

?>
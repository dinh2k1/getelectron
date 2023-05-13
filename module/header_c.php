<?php require_once('lib/db.php');?>
<?php 
class header_controller extends DB{

	public function get_cat(){
		$cats = $this->select('cat');
		return $cats;
	}
	
	public function get_catp(){
		$catps = $this->select('cat_post');
		return $catps;
	}
	
}
?>
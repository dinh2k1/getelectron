<!--phần danh mục dưới footer-->

<?php require_once('lib/db.php');?>
<?php 
class footer_controller extends DB{

	public function get_cat(){
		$cats = $this->select('cat');
		return $cats;
	}
	
}
?>
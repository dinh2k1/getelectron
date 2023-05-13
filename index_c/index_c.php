
<!--xuất sản phẩm và danh mục sản phẩm-->

<?php require_once('lib/atz.php');?>
<?php 
class index_controller extends atz{

	public function get_cats(){
		$cats = $this->select('cat');
		return $cats;
	}
	
	public function get_catp(){
		$catps = $this->select('cat_post');
		return $catps;
	}

	public function get_product_hot(){
		$products = $this->select('product',array('Product_Hot' => 1));
		
		return $products;
	}

	public function get_product(){
		$products = $this->select('product',array('Product_Cat' => 28));

		return $products;
	}
	public function get_post(){
		$posts = $this->select('post',array('Post_Cat' => 28));

		return $posts;
	}
	
}

?>
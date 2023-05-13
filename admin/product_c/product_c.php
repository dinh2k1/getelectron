<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class product_controller extends atz{

	public function __construct() { 
		// parent::__construct();

		$this->check_login();
		
		$this->post = array(
			'Product_Name'=>'',
			'Product_Thumbnail'=>'',
			'Product_Desc'=>'',
			'Product_Content' =>'',
			'Product_mount'=>'',
			'Product_quantity'=>'',
			'Product_Price' =>'',
			
			'Product_Hot' => 0,
			'Product_Order'=>'',
			'Product_Cat' =>'',
		);
	}

	public function get_product(){
		$products = $this->select('product');
		return $products;
	}

	public function get_cat(){
		$cats = $this->select('cat');
		return $cats;
	}

	public function add_product(){


		$post = $this->post;

		if(isset($_GET['edit'])){

			$product  = $this->select('product',array('Product_ID'=>$_GET['edit']));
			
			if($product){
				$product = $product[0];

				foreach ($product as $k => $v) {
					if(isset($post[$k])){
						$post[$k] =$v;
					}
				}

				$this->post = $post;
			}
		}

		
		// Insert, Update
		if(!empty($_REQUEST) && isset($_REQUEST['submit'])){

			foreach ($_REQUEST as $k => $v) {
				if(isset($post[$k])){
					$post[$k] =$v;
				}
			}	

			if(!$post['Product_Name']){
				$error['Product_Name'] = 'Chưa nhập tên';
			}
			if(!$post['Product_Order']){
				$error['Product_Order'] = 'Chưa nhập thứ tự';
			}elseif(!is_numeric($post['Product_Order'])){
				$error['Product_Order'] = 'Chỉ được nhập số';
			}



			if(empty($error)){

				$dir = '../upload';

				$old_link = '';

				if(!is_dir($dir)){
					mkdir($dir);
				}


				$old_link = $dir.'/'.$post['Product_Thumbnail'];
				
                 
				// Kiểm tra có upload file hay ko?
				$file = '';
				if(isset($_FILES['Product_Thumbnail']) && !empty($_FILES['Product_Thumbnail'])){
                 
					$file = $_FILES['Product_Thumbnail'];
                    
					// Chỉ cho upload ảnh
					$allow_type = array('jpg','jepg','png','gif');
					$ex = explode('.', $file['name']);
					if(in_array(end($ex), $allow_type)){
						
						$tmp_name  = $file['tmp_name'];
						$name = time().'_'.basename($file["name"]);
						
						move_uploaded_file($tmp_name, $dir.'/'.$name);

						$post['Product_Thumbnail'] = $name;
						
					}
				}
				

				
                 
			
				
				if (!isset($_REQUEST['edit'])) {

					// Insert
					$post['Product_Created'] = date('Y-m-d H:i:s');
					$rs = $this->insert('product', $post);

				}else{

					// Update
					$post['Product_Update'] = date('Y-m-d H:i:s');
					$rs = $this->update('product', $post, array('Product_ID' => $_REQUEST['edit']));
					
					if(isset($file['tmp_name']) && !empty($file['tmp_name'])){
						if(file_exists($old_link)){
							unlink($old_link);	
						}
					}
				}

				if($rs==1){
					header("location:product_list.php");
				}

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
	}

	public function remove_product(){

		if(isset($_GET['delete'])){
			$rs = $this->delete('product',array('Product_ID' => $_GET['delete']));
		
			if($rs==1){
				header("location:product_list.php");
			}
		}
	}
	
	
}
?>
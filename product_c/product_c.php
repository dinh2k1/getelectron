<?php require_once('lib/atz.php');?>
<?php 
class product_controller extends atz{


	public function get_cat(){
		if(isset($_GET['cat']) && !empty($_GET['cat'])){
			$cat = $this->select('cat',array('Cat_ID' => $_GET['cat']));
			
			if(!empty($cat)){
				return $cat[0];	
			}
		}
	}

	// Danh sách sản phẩm
	public function get_list_product(){
		
		if(isset($_GET['cat']) && !empty($_GET['cat'])){
			$products = $this->select('product',array('Product_Cat' => $_GET['cat']));
			
			if(!empty($products)){
				return $products;	
			}			
		}
	}
    //lấy thông tin của sản phẩm
	public function get_product(){

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$products = $this->select('product',array('Product_ID' => $_GET['id']));
			
			if(!empty($products)){
				return $products[0];	
			}
			header('location:index.php');	
		}
		header('location:index.php');
	}
     
	
	//tìm tên của sản phẩm
	public function get_search_product(){

		if(isset($_GET['search']) && !empty($_GET['search'])){
			$products = $this->select_like('product',array('Product_Name' => $_GET['search']));
			
			if(!empty($products)){
				return $products;
			}	
		}
	}
	public function confirm_com_desc(){
		
		if(isset( $_POST['submit']) && !empty($_POST)){

			foreach ($_POST as $k => $v) {
				if(isset($this->post[$k])){
					$this->post[$k] =$v;
				}
			}

			

			if(!empty($_POST['com_id'])){

				foreach ($_POST['com_id'] as $v) {
					$rs = $this->select('comment',array('com_id' => $v),'com_desc ');
					if(!empty($rs)){
						$comment[] = $rs[0];
						
					}
				}
			}
			
			

			$error = array();

			if(empty($_SESSION['comment'])){
				$error['main'] = 'Không có thông tin comment nào';
			}
			if(!$this->post['com_desc']){
				$error['com_desc'] = 'Chưa nhập bình luận';
			}
			
			
			

			
			if(empty($error)){
				
				$rs = $this->insert('comment', $this->post);

				if($rs==1){
					$success['main'] = 'Liên hệ thành công!';
					$rs = array('success' => $success);

					unset($_POST);
					unset($_SESSION['comment']);

				}else{
					$error['main'] = 'Có lỗi xảy ra. Vui lòng thử lại sau';
					$rs = array('error' => $error);
				}
				return $rs;

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
		
	}
}

?>
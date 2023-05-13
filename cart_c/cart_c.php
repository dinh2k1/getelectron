<?php require_once('lib/atz.php');?>
<?php 
class cart_controller extends atz{

	public function __construct() { 

		$this->post = array(
			'Orders_Name'=>'',
			'Orders_Phone'=>'',
			'Orders_Email'=>'',
			'Orders_Address' =>'',
			'Orders_Mess' =>'',
			'Orders_Price'=>'',
			'Orders_Payway'=>'',
			'Orders_Rec'=>'',
			'Orders_HCM'=>'',
			'Orders_HN'=>'',
			'Orders_Created'=> date('Y-m-d H:i:s'),
			'Orders_Product_ID'=>''
		);
	}

	public function update_cart(){

		// Thêm sản phẩm vào giỏ hàng
		if(isset($_POST['id']) && !empty($_POST['id'])){

			
			$products = $this->select('product',array('Product_ID' => $_POST['id']),'Product_ID, Product_Name, Product_Thumbnail, Product_Price');

			if(!empty($products)){
				
				$products = $products[0];

				$_SESSION['cart'][$products['Product_ID']] = $products;
				$_SESSION['cart'][$products['Product_ID']]['quanlity'] = $_POST['quanlity'];
				return $_SESSION['cart'];
			}
		}


		// Xóa sản phẩm trong giỏ hàng
		if(isset($_POST['delete']) && !empty($_POST['delete'])){
			
			unset($_SESSION['cart'][$_POST['delete']]);
			
			echo 1;exit;
		}

		
		
		
	}

	 /*hiển thị trang giỏ hàng trong thanh toán*/
	public function checkout_cart(){
		
		if(isset($_POST['submit']) && !empty($_POST)){

			foreach ($_POST as $k => $v) {
				if(isset($this->post[$k])){
					$this->post[$k] =$v;
				}
			}

			$quanlity = '';
			if(isset($_POST['quanlity'])){
				$quanlity = $_POST['quanlity'];
			}
			$total_price = 0;

			if(!empty($_POST['product_id'])){

				foreach ($_POST['product_id'] as $v) {
					$rs = $this->select('product',array('Product_ID' => $v),'Product_ID, Product_Name, Product_Thumbnail, Product_Price');
					if(!empty($rs)){
						$products[] = $rs[0];
						$total_price += $rs[0]['Product_Price']*$quanlity[$v];
					}
				}
			}
			
			$this->post['Orders_Price'] = $total_price;

			$error = array();

			if(empty($_SESSION['cart'])){
				$error['main'] = 'Không có sản phẩm nào trong giỏ hàng';
			}
			if(!$this->post['Orders_Name']){
				$error['Orders_Name'] = 'Chưa nhập họ tên';
			}
			if(!$this->post['Orders_Phone']){
				$error['Orders_Phone'] = 'Chưa nhập số điện thoại của bạn';
			}elseif(!is_numeric($this->post['Orders_Phone'])){
				$error['Orders_Phone'] = 'Chỉ được nhập số';
			}
			if($this->post['Orders_Email'] && !filter_var($this->post['Orders_Email'], FILTER_VALIDATE_EMAIL)){
				$error['Orders_Email'] = 'Email không hợp lệ';
			}if(!$this->post['Orders_Address']){
				$error['Orders_Address'] = 'Chưa nhập địa chỉ';
			}
			if(!$this->post['Orders_Rec']){
				$error['Orders_Rec'] = 'Chưa chọn cách thức nhận hàng';
			}
		
			
			
			
			foreach ($_SESSION['cart'] as $v) {
				$this->post['Orders_Product_ID'] .= $v['Product_ID'].',';
			}

			$this->post['Orders_Product_ID'] = trim($this->post['Orders_Product_ID'],',');
			
			if(empty($error)){
				
				$rs = $this->insert('orders', $this->post);

				if($rs==1){
					$success['main'] = 'Đặt hàng thành công!';
					$rs = array('success' => $success);

					unset($_POST);
					unset($_SESSION['cart']);

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
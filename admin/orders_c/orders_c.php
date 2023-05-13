<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class orders_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'Orders_Name'=>'',
			'Orders_Phone'=>'',
			'Orders_Email'=>'',
			'Orders_Address' =>'',
			'Orders_Mess'=>'',
			'Orders_Price'=>'',
			'Orders_Payway'=>0,
			'Orders_HCM'=>'',
			'Orders_HN'=>'',
			'Orders_Rec'=>0,
			'Orders_Status'=>0,
			'Orders_Product_ID' => '',
			'Orders_Created'=> date('Y-m-d H:i:s')
		);
	}

	public function get_orders(){
		$orders = $this->select('orders');
		return $orders;
	}

	public function add_orders(){


		$post = $this->post;

		if(isset($_GET['edit'])){

			$orders  = $this->select('orders',array('Orders_ID'=>$_GET['edit']));
			
			if($orders){
				$orders = $orders[0];

				foreach ($orders as $k => $v) {
					if(isset($post[$k])){
						$post[$k] =$v;
					}
				}

				$this->post = $post;
			}
		}

		
		// thêm , cập nhật
		if(!empty($_REQUEST) && isset($_REQUEST['submit'])){

			foreach ($_REQUEST as $k => $v) {
				if(isset($post[$k])){
					$post[$k] =$v;
				}
			}	

			if(!$post['Orders_Status']){
				$error['Orders_Status'] = 'Chưa chọn trạng thái';
			}

			if(empty($error)){

				if (isset($_REQUEST['edit'])) {

					// cập nhật
					$post['Orders_Update'] = date('Y-m-d H:i:s');
					$rs = $this->update('orders', $post, array('Orders_ID' => $_REQUEST['edit']));
				}

				if($rs==1){
					header("location:orders_list.php");
				}

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
	}

	public function get_orders_detail(){

		

		if(isset($_GET['id'])){

			$orders  = $this->select('orders',array('Orders_ID'=>$_GET['id']));
			$orders_detail = array();
			
			if($orders){
				$orders = $orders[0];

				if(!empty($orders['Orders_Product_ID'])){
					$orders_detail = $this->select_in('product','Product_ID IN ('.$orders['Orders_Product_ID'].')');
				}
			
				
			}

			return $orders_detail;
		}

		
		
	}

}
?>
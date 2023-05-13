<?php require_once('lib/atz.php');?>
<?php 
class orders_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'Orders_Name'=>'',
			
			'Orders_Phone'=>'',
			'Orders_Email'=>'',
			
			'Orders_Message'=>'',
			'Orders_Created'=> date('Y-m-d H:i:s'),
			'Orders_Update'=> date('Y-m-d H:i:s')
		);
	}

	public function get_orders(){
		$orders = $this->select('orders');
		return $orders;
	}

	

	public function get_orders_detail(){

		

		if(isset($_GET['id'])){

			$orders = $this->select('orders',array('Orders_ID'=>$_GET['id']));
			$orders_detail = array();
			
			if($orders){
				$orders = $orders[0];

				if(!empty($orders['orders_Orders_ID'])){
					$orders_detail = $this->select_in('orders','Orders_ID IN ('.$orders['orders_Orders_ID'].')');
				}
			
				
			}

			return $orders_detail;
		}

		
		
	}

}
?>
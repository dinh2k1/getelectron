<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class nguoidung_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			
			'tennd'=>'',
			
			'password'=>'',
			'ngaysinh'=>'',
			'gioitinh' =>'',
			'email'=>'',
			'dienthoai'=>'',
			'diachi'=>'',
			'ngaydangky'=>'',
		);
		
	}

	public function get_nguoidung(){
		$nguoidung = $this->select('nguoidung');
		return $nguoidung;
	}

	public function get_nguoidung_detail(){

		

		if(isset($_GET['id'])){

			$nguoidung  = $this->select('nguoidung',array('idnd'=>$_GET['id']));
			$nguoidung_detail = array();
			
			if($nguoidung){
				$nguoidung = $nguoidung[0];

				if(!empty($nguoidung['nguoidung_idnd'])){
					$nguoidung_detail = $this->select_in('nguoidung','idnd IN ('.$nguoidung['nguoidung_idnd'].')');
				}
			
				
			}

			return $nguoidung_detail;
		}

		
		
	}

}
?>
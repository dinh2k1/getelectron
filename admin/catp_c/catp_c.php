<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class catp_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'Catp_Name'=>'',
			
			'Catp_Order'=>''
		);
		
	}

	public function get_catp(){
		$catps = $this->select('cat_post');
		return $catps;
	}

	public function add_catp(){

		$post = $this->post;

		if(isset($_GET['edit'])){

			$catp = $this->select('cat_post',array('Catp_ID'=>$_GET['edit']));

			if($catp){
				$catp = $catp[0];

				foreach ($catp as $k => $v) {
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

			if(!$post['Catp_Name']){
				$error['Catp_Name'] = 'Chưa nhập tên';
			}
			if(!$post['Catp_Order']){
				$error['Catp_Order'] = 'Chưa nhập thứ tự';
			}elseif(!is_numeric($post['Catp_Order'])){
				$error['Catp_Order'] = 'Chỉ được nhập số';
			}

			if(empty($error)){

				if (!isset($_REQUEST['edit'])) {

					$post['Catp_Created'] = date('Y-m-d H:i:s');
					$rs = $this->insert('cat_post', $post);
					
				}else{

					$post['Cats_Update'] = date('Y-m-d H:i:s');
					$rs = $this->update('cat_post', $post, array('Catp_ID' => $_REQUEST['edit']));
				}

				if($rs==1){
					header("location:catp_list.php");die;
				}

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
	}


	public function remove_catp(){

		if(isset($_GET['delete'])){
			$rs = $this->delete('cat_post',array('Catp_ID' => $_GET['delete']));
		
			if($rs==1){
				header("location:catp_list.php");
			}
		}
	}
	
}
?>
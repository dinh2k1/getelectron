<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class cat_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'Cat_Name'=>'',
			'Cat_Desc'=>'',
			'Cat_Thumbnail'=>'',
			'Cat_Keywords' =>'',
			'Cat_Order'=>''
		);
		
	}

	public function get_cat(){
		$cats = $this->select('cat');
		return $cats;
	}

	public function add_cat(){

		$post = $this->post;

		if(isset($_GET['edit'])){

			$cat = $this->select('cat',array('Cat_ID'=>$_GET['edit']));

			if($cat){
				$cat = $cat[0];

				foreach ($cat as $k => $v) {
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

			if(!$post['Cat_Name']){
				$error['Cat_Name'] = 'Chưa nhập tên';
			}
			if(!$post['Cat_Order']){
				$error['Cat_Order'] = 'Chưa nhập thứ tự';
			}elseif(!is_numeric($post['Cat_Order'])){
				$error['Cat_Order'] = 'Chỉ được nhập số';
			}

			if(empty($error)){

				if (!isset($_REQUEST['edit'])) {

					$post['Cat_Created'] = date('Y-m-d H:i:s');
					$rs = $this->insert('cat', $post);
					
				}else{

					$post['Cat_Update'] = date('Y-m-d H:i:s');
					$rs = $this->update('cat', $post, array('Cat_ID' => $_REQUEST['edit']));
				}

				if($rs==1){
					header("location:cat_list.php");die;
				}

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
	}


	public function remove_cat(){

		if(isset($_GET['delete'])){
			$rs = $this->delete('cat',array('Cat_ID' => $_GET['delete']));
		
			if($rs==1){
				header("location:cat_list.php");
			}
		}
	}
	
}
?>
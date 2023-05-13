<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class comment_controller extends atz{

	public function __construct() { 

		$this->check_login();
		
		$this->post = array(
			'com_desc'=>'',
			
			
		);
	}

	public function get_comment(){
		$comment = $this->select('comment');
		return $comment;
	}

	

	public function get_comment_detail(){

		

		if(isset($_GET['id'])){

			$comment  = $this->select('comment',array('com_id'=>$_GET['id']));
			$comment_detail = array();
			
			if($comment){
				$comment= $comment[0];

				if(!empty($comment['comment_com_id'])){
					$comment_detail = $this->select_in('comment','com_id IN ('.$comment['comment_com_id'].')');
				}
			
				
			}

			return $comment_detail;
		}

		
		
	}

}
?>
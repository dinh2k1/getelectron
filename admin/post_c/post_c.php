<?php ob_start(); require_once('../lib/atz.php');?>
<?php 
class post_controller extends atz{

	public function __construct() { 
		// parent::__construct();

		$this->check_login();
		
		$this->post = array(
			'Post_Title'=>'',
			'Post_Thumbnail'=>'',
			'Post_Desc'=>'',
			'Post_Content' =>'',
			
			'Post_Order'=>'',
			'Post_Cat'=>'',
			
			
		);
	}

	public function get_post(){
		$posts = $this->select('post');
		return $posts;
	}

public function get_catp(){
		$catps = $this->select('cat_post');
		return $catps;
	}

	
	
	
	public function add_post(){


		$post = $this->post;

		if(isset($_GET['edit'])){

			$post  = $this->select('post',array('Post_ID'=>$_GET['edit']));
			
			if($post){
				$post = $post[0];

				foreach ($post as $k => $v) {
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

			if(!$post['Post_Title']){
				$error['Post_Title'] = 'Chưa nhập tên';
			}
			



			if(empty($error)){

				$dir = '../upload';

				$old_link = '';

				if(!is_dir($dir)){
					mkdir($dir);
				}


				$old_link = $dir.'/'.$post['Post_Thumbnail'];
				
                 
				// Kiểm tra có upload file hay ko?
				$file = '';
				if(isset($_FILES['Post_Thumbnail']) && !empty($_FILES['Post_Thumbnail'])){
                 
					$file = $_FILES['Post_Thumbnail'];
                    
					// Chỉ cho upload ảnh
					$allow_type = array('jpg','jepg','png','gif');
					$ex = explode('.', $file['name']);
					if(in_array(end($ex), $allow_type)){
						
						$tmp_name  = $file['tmp_name'];
						$name = time().'_'.basename($file["name"]);
						
						move_uploaded_file($tmp_name, $dir.'/'.$name);

						$post['Post_Thumbnail'] = $name;
						
					}
				}
				

				
                 
			
				
				if (!isset($_REQUEST['edit'])) {

					// Insert
					$post['Post_Created'] = date('Y-m-d H:i:s');
					$rs = $this->insert('post', $post);

				}else{

					// Update
					$post['Post_Update'] = date('Y-m-d H:i:s');
					$rs = $this->update('post', $post, array('Post_ID' => $_REQUEST['edit']));
					
					if(isset($file['tmp_name']) && !empty($file['tmp_name'])){
						if(file_exists($old_link)){
							unlink($old_link);	
						}
					}
				}

				if($rs==1){
					header("location:post_list.php");
				}

			}else{
				$rs = array('error' => $error);
				return $rs;	
			}
		}
	}

	public function remove_post(){

		if(isset($_GET['delete'])){
			$rs = $this->delete('post',array('Post_ID' => $_GET['delete']));
		
			if($rs==1){
				header("location:post_list.php");
			}
		}
	}
	
	
}
?>
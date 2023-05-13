<?php require_once('lib/atz.php');?>
<?php 
class post_controller extends atz{
		public function get_catp(){
		if(isset($_GET['cat_post']) && !empty($_GET['cat_post'])){
			$catp = $this->select('cat_post',array('Catp_ID' => $_GET['cat_post']));
			
			if(!empty($catp)){
				return $catp[0];	
			}
		}
	}

// Danh sách sản phẩm
	public function get_list_post(){
		
		if(isset($_GET['cat_post']) && !empty($_GET['cat_post'])){
			$posts = $this->select('post',array('Post_Cat' => $_GET['cat_post']));
			
			if(!empty($posts)){
				return $posts;	
			}			
		}
	}
	
    //lấy thông tin của bài viết
	public function get_post(){

		if(isset($_GET['id']) && !empty($_GET['id'])){
			$posts = $this->select('post',array('Post_ID' => $_GET['id']));
			
			if(!empty($posts)){
				return $posts[0];	
			}
			header('location:index.php');	
		}
		header('location:index.php');
	}
     
	
	//tìm tên của bài viết
	public function get_search_post(){

		if(isset($_GET['search']) && !empty($_GET['search'])){
			$posts = $this->select_like('post',array('Post_Title' => $_GET['search']));
			
			if(!empty($posts)){
				return $posts;
			}	
		}
	}	
}
?>
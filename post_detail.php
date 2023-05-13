

<?php require_once('post_c/post_c.php');?>

<?php 
    $post_class = new post_controller();

    $post = $post_class->get_post();    

 

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Get Electron | Shop điện tử</title>

    <!-- HEAD -->
    <?php include('module/head.php')?>
    <!-- END HEAD -->
</head>

<body>

    <div class="web-warper">
        
        <!-- HEAD -->
        <?php include('module/header.php')?>
        <!-- END HEAD -->

        

        <div class="container">
            <div class="list-warper post-detail">
                
                <div class="row title">
                    <div class="col-md-12">
                        <h1 class="mb-0 px-2"><?=$post['Post_Title']?></h1>
                    </div>
                </div>
                
                <div class="row my-3">
                    <div class="col-md-7">
                        <img src="upload/<?=$post['Post_Thumbnail']?>" width=600  alt="<?=$post['Post_Title']?>">
					</div></br></br>
					
					
					 <div class="row px-2">	
                    <div class="col-md-12">
                        <h2>Giới thiệu</h2>
						<p><?=$post['Post_Desc']?></p></div>
						 
					</div>
                      
						
       
				
		
                <div class="row px-2">
                    <div class="col-md-12">
                        <h2>Thông tin của bài viết</h2>
                        <p><?=$post['Post_Content']?></p>
                    </div>
                </div>
	
				</div>
			</div>

        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
	<!--phần só lượng giỏ hàng-->
    <?php include('module/js.php') ?> 
	

</body>

</html>
<?php require_once('header_c.php');?>

<?php 
    $header_class = new header_controller();

    $cats = $header_class->get_cat();

   $catps = $header_class->get_catp();
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<header>
    <div class="navbar-header">
        <div class="container py-2"> <!--phần thanh tìm kiếm và logo trang chủ-->

            <form action="product_search.php" method="get" class="form-inline my-2 my-lg-0">
                <a class="navbar-brand" href="index.php" class="float-left"><img src="img/logo.png" alt="" width="100" height="45"></a>
				
				
               <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Search" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];}?>">
               
		 <i class="fas fa-search" style="color: #FFF;"></i> 
				
            </form>
			
			
        </div>
    </div>

	
	
	
	
	
    <nav class="navbar navbar-expand-lg main-menu navbar-light"> <!--phần thanh menu-->
        
			
				
		<div class="container">
            <!--hiển thị các danh mục sản phẩm-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
				
            </button>
			
			<div  class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                   
                            <li class="nav-item">
                                <a class="nav-link"href="gioithieu.php">Giới thiệu </a>
                            </li> 
				
                  </ul>
	
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php if (!empty($cats)): ?>
                        <?php foreach ($cats as $v): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="product_list.php?cat=<?=$v['Cat_ID']?>"><?=$v['Cat_Name']?></a>
                            </li>        
                        <?php endforeach ?>
                    <?php endif ?>
					
			
					
					
					
					<div  class="collapse navbar-collapse" >
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                   
                            <li class="nav-item">
                                <a class="nav-link"href="cont.php">Liên hệ </a>
                            </li> 
				
                  </ul>
					
				
			<div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <?php if (!empty($catps)): ?>
                        <?php foreach ($catps as $v): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="post_list.php?cat_post=<?=$v['Catp_ID']?>"><?=$v['Catp_Name']?></a>
                            </li>        
                        <?php endforeach ?>
                    <?php endif ?>
				
					
					  </div>
						
                </ul>
            </div>
        </div>
	
    </nav>

</header>
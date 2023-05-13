<!-- html của web-->


<?php require_once('index_c/index_c.php');?>

<?php 
    $index_class = new index_controller();
    
    $product_hot = $index_class->get_product_hot();

    $product = $index_class->get_product();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Get Electron | Shop điện tử</title>

    <!-- HEAD -->
    <?php include('module/head.php')?>
    <!-- END HEAD -->
	<link rel="stylesheet" href="assets/css/text.css">
	
</head>

<body>

   
        <!-- HEAD -->
        <?php include('module/header.php')?>
        <!-- END HEAD -->

        <!-- SLIDER -->
        <?php include('module/slider.php')?>
        <!-- END SLIDER -->
          <div align="center">
        <div class="container">
               <b class="list-title">SẢN PHẨM NỔI BẬT CỦA SHOP</b>
                <div class="row product-list p-2"> <!--đường link của tên và giá sản phẩm-->
                    <div class="col-md-12">
                        <div class="data-slider owl-carousel owl-theme"> <!--phần slider của sản phẩm hot-->
                            <!-- foreach -->
                             
                            <?php if (!empty($product_hot)): ?>
                                
                                <?php foreach ($product_hot as $v): ?>
                                    <div class="item">
                                        <a href="product_detail.php?id=<?=$v['Product_ID']?>">
                                            <div class="blog-one__single">
                                                <figure>
                                                    <img src="upload/<?=$v['Product_Thumbnail']?>" alt="" class="img-fluid" alt="<?=$v['Product_Name']?>">
                                                </figure>
                                                <p class="p-title"><?=$v['Product_Name']?></p>
                                                <p class="p-price"><?=number_format($v['Product_Price'],0,',','.').'<u>đ</u>'?></p>
                                            </div>
                                        </a>
                                    </div>
							
                                <?php endforeach ?>

                            <?php endif ?>
                            
                            <!-- endforeach -->
                        </div>
                    </div>
                </div>
            </div>
	</div>
	
	
            <div align="center">
            <div class="list-warper">
                <h2 class="list-title">ĐIỆN THOẠI NỔI BẬT NHẤT</h2>
	

                <div class="row product-list p-2">
                    <div class="col-md-12">
                        <div class="data-slider owl-carousel owl-theme">
							
                            <!-- foreach -->
                             
                            <div class="item">
                              <a href="product_detail.php?id=1">
                                    <div class="blog-one__single">
										
                                        <figure>
                                            <img src="img/hinh.png" alt="" class="img-fluid">
                                        </figure>
										<div align="center">
                                        <p class="p-title">OPPO Reno 4</p>
											<p class="p-price">8.490.000<u>đ</u></p> 
                                    </div>
                                   </div>
								</a>
                            </div>

                            <div class="item">
                               <div class="blog-one__single">
								<a href="product_detail.php?id=3">   
                                        <figure>
                                            <img src="img/iphone12.jpg" alt="" class="img-fluid">
                                        </figure>
                                         <p class="p-title">IPHONE 12 Pro Max</p>
                                        <p class="p-price">15.990.000<u>đ</u></p><del>25.000.000<u>đ</u></del>
                                    </div>
								   </a>
                             </div>
							
							<div class="item">
                               <div class="blog-one__single">
								   <a href="product_detail.php?id=39"> 
                                        <figure>
                                            <img src="img/realme-x9.jpg" alt="" class="img-fluid">
                                        </figure>
                                         <p class="p-title">Realme X9 5G</p>
                                        <p class="p-price">15.660.000<u>đ</u></p>
                                    </div>
								 </a>
                             </div>
							
							<div class="item">
                               <div class="blog-one__single">
								   <a href="product_detail.php?id=40">
                                        <figure>
                                            <img src="img/realme-c20-1.jpg" alt="" class="img-fluid">
                                        </figure>
                                         <p class="p-title">Realme C20</p>
                                        <p class="p-price">2.590.000<u>đ</u></p>
                                    </div>
								</a>
                             </div>
							
							
							
							<div class="item">
                               <div class="blog-one__single">
								 <a href="product_detail.php?id=43">  
                                        <figure>
                                            <img src="img/nubia_img-2.jpg" alt="" class="img-fluid">
                                        </figure>
                                         <p class="p-title">Nubia Red Magic 6 Pro </p>
                                        <p class="p-price">19.990.000<u>đ</u></p>
                                    </div>
								   </a>
							  </div>
							
							<div class="item">
                               <div class="blog-one__single">
								    <a href="product_detail.php?id=38">
								      <figure>
                                            <img src="img/11_3_1_1.jpg" alt="" class="img-fluid">
                                        </figure>
                                         <p class="p-title">Vsmart Aris 8GB 128GB</p>
                                        <p class="p-price">4.690.000<u>đ</u></p>
                                    </div>
								   </a>
						       </div>
                            <!-- endforeach -->
                        </div>
                    </div>
                </div>
            </div>
	</div>
	
	
	        
                <div align="center">
				<div class="list-warper">
                <h2 class="list-title">LAPTOP NỔI BẬT NHẤT</h2>
                <p>&nbsp;</p>
                <div class="row product-list p-2">
                    <div class="col-md-12">
                        <div class="data-slider owl-carousel owl-theme">
                            <!-- foreach -->
                            

                            
							
							<div class="item">
                              <div class="blog-one__single">
								<a href="product_detail.php?id=45">  
                                        <figure>
                                            <img src="img/laptop-asus-gaming-rog-strix-g512-i7-10870h-2.JPG" alt="" class="img-fluid">
                                        </figure>
                                        <p class="p-title">Laptop asus gaming rog strix g512</p>
                                        <p class="p-price">26.990.000<u>đ</u></p>
                                    </div>
								  </a>
							</div>
							
							<div class="item">
                              <div class="blog-one__single">
								  <a href="product_detail.php?id=46">
                                        <figure>
                                            <img src="img/laptop-asus-rog-zephyrus-g14-ga401qh-hz035t-4.JPG" alt="" class="img-fluid">
                                        </figure>
                                        <p class="p-title">Laptop asus gaming rog g14</p>
                                        <p class="p-price">28.490.000<u>đ</u></p>
                                    </div>
								  </a>
							</div>
							
							<div class="item">
                              <div class="blog-one__single">
								   <a href="product_detail.php?id=49">
                                        <figure>
                                            <img src="img/laptop-asus-zenbook-duo-14-ux482eg-1.JPG" alt="" class="img-fluid">
                                        </figure>
                                        <p class="p-title">Laptop asus zenbook duo 14</p>
                                        <p class="p-price">32.990.000<u>đ</u></p>
                                    </div>
								  </a> 
							</div>
							
							
							
							
							
							<!-- endforeach -->
                        </div>
                    </div>
                </div>
            </div>            
	</div>
	
	
		
     <div class="section__btn-contact">
	<div class="btn__contact-item btn-callnow">
		<a href="tel:0902732173"  title="0902732173"><img src="https://nhietthuantam.com/wp-content/uploads/icons8-call-100.png" alt="icon call"> </a>
	</div>

	<div class="btn__contact-item btn-zalo">
		<a href="https://zalo.me/0902732173"
title="Get Electron"> <img src="https://nhietthuantam.com/wp-content/uploads/icons8-zalo.svg" alt="zalo"/></a>
	</div>

	
	
</div>
	
	
    
	

        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
    <?php include('module/js.php') ?>


    <script>
        $(".data-slider").owlCarousel({		
			"items": 3,
            "margin": 40, 
            "smartSpeed": 700, 
            "autoplay": true, 
            "autoplayTimeout": 5000,
            "autoplayHoverPause": true, 
            "nav": false, 
            "navText": ["",""],
            "dots": false,
            "loop": true,
           "responsive": {  
                "0": { "items": 1, "margin": 0},
                "575": { "items": 2, "margin": 0},
                "767": { "items": 3, "margin": 0},
                "991": { "items": 4, "margin": 0},
                "1199": { "items": 5, "margin": 0}
            }
        });
    </script>
</body>

</html>
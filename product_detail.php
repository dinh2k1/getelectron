
<!--phần chi tiết sản phẩm và giỏ hàng-->

<?php require_once('product_c/product_c.php');?>

<?php 
    $product_class = new product_controller();

    $product = $product_class->get_product();    



?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Get Electron | Shop điện tử</title>

    <!-- HEAD -->
    <?php include('module/head.php')?>
    <!-- END HEAD -->
	<link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
	  
<link rel="stylesheet" href="3.css">
</head>

<body>

    <div class="web-warper">
        
        <!-- HEAD -->
        <?php include('module/header.php')?>
        <!-- END HEAD -->

        

        <div class="container">
            <div class="list-warper product-detail">
                
                <div class="row title">
                    <div class="col-md-12">
                        <h1 class="mb-0 px-2"><?=$product['Product_Name']?></h1>
                    </div>
                </div>
                
                <div class="row my-3">
                    <div class="col-md-7">
                        <img src="upload/<?=$product['Product_Thumbnail']?>" class="d-block mx-auto"  alt="<?=$product['Product_Name']?>">
                    </div>
					
					
						
                    <div class="col-md-4">
                        <h2>Giới thiệu</h2>
						<p><?=$product['Product_Desc']?></p>
						 
                        <p class="p-price"><?=number_format($product['Product_Price'],0,',','.')?><u>đ</u></p>
                      
						
        <form action="cart.php" method="post">
                            <div class="row my-3">
                                <div class="col-md-6 ">
                                    <div class="input-group">
                                        
                                        <input type="hidden" name="id" class="form-control" value="<?=$product['Product_ID']?>">
										
                                        <input type="number" name="quanlity" class="form-control" placeholder="" value="1"name="quantity" min="0" max="<?=$product['Product_quantity']?>">

										
                                        
                                    </div>
                                </div>
                                <div class="col-md-6">
                              <button type="submit" class="btn btn-primary">  <i class="fas fa-cart-plus"></i>Đặt hàng</button>
                                </div>
								
                            </div>
                        </form>
						
                    </div>
                </div>
				
                      <p><b><div style="color:dodgerblue">Trạng thái:</div> <?=$product['Product_mount']?></b></p></br>
			<p><b><div style="color:dodgerblue">Số lượng:</div> <?=$product['Product_quantity']?></b></p></br>
		
                <div class="row px-2">
                    <div class="col-md-12">
                        <h2>Thông tin của sản phẩm</h2>
                        <p><?=$product['Product_Content']?></p>
                    </div>
                </div>
		
		
                    </div>
	
	
            </div>

        </div>

        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
	<!--phần só lượng giỏ hàng-->
    <?php include('module/js.php') ?> 
	
<!--khi phần giảm sản phẩm của giỏ hàng thì sẽ trở về giá trị 1-->
    <script>
        function minus_number(){
            var val = parseInt($("input[name=quanlity]").val());

            if(val>1){
                $("input[name=quanlity]").val(val-1);    
            }
        }

        function plus_number(){
            var val = parseInt($("input[name=quanlity]").val());
            $("input[name=quanlity]").val(val+1);
			
        } 
    </script>
</body>

</html>
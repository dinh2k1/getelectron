<!--danh sách các sản phẩm->

<?php require_once('product_c/product_c.php');?>

<?php 
    $product_class = new product_controller();

    $cat = $product_class->get_cat();
    $products = $product_class->get_list_product();

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

        <!-- SLIDER -->
        <?php include('module/slider.php')?>
        <!-- END SLIDER -->
       <div align="center">
        <div class="container">
            <div class="list-warper">
                <h1 class="list-title"><?=$cat['Cat_Name']?></h1>
			     <div class="row product-list p-2"> <!--link sản phẩm trong danh mục sản phẩm-->
                    <div class="col-md-12">
                        <div class="data-slider owl-carousel owl-theme">
                            <!-- foreach -->

                            <?php if (!empty($products)): ?>
                                
                                <?php foreach ($products as $v): ?>
                                    <div class="item">
                                        <a href="product_detail.php?id=<?=$v['Product_ID']?>">
                                            <div class="blog-one__single">
                                                <figure>
                                                    <img src="upload/<?=$v['Product_Thumbnail']?>" alt="" class="img-fluid" alt="<?=$v['Product_Name']?>">
                                                </figure>
                                                <p class="p-title"><?=$v['Product_Name']?></p>
                                                <p class="p-price"><?=number_format($v['Product_Price'],0,',','.').'<u>đ</u>'?></p><!--số 0 ở dòng trên tăng số thập phân đuôi sau-->
                                            </div>
                                        </a>
                                    </div>
                                <?php endforeach ?>
                            <?php else: ?>
                               không có kết quả hiển thị
                            <?php endif ?>
                            
                            <!-- endforeach -->
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
</div>
        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
    <?php include('module/js.php') ?>

    <!--phần hiển thị sản phẩm theo kiểu slider trong danh mục sản phẩm-->
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
                "991": { "items": 4, "margin": 40},
                "1199": { "items": 5, "margin": 40}
            }
        });
    </script>
</body>

</html>
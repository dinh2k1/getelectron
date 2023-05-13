<?php require_once('product_c/product_c.php');?>

<?php 
    $product_class = new product_controller();

    $products = $product_class->get_search_product();

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

        
        <div align="center">
        <div class="container">
            <div class="list-warper">
                <h1 class="list-title">Sản phẩm bạn tìm:</h1>
                <div class="row product-list p-2">
                    <div class="col-md-12">
                        <?php if (!empty($products)): ?>
                        <div class="data-slider owl-carousel owl-theme">
                            
                            <?php foreach ($products as $v): ?>
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

                        </div>
                        <?php else: ?>
                            <p>Không có sản phẩm nào phù hợp</p>                        
                        <?php endif ?>
                    </div>
                </div>
            </div>

        </div>
</div>
        <?php include('module/footer.php') ?>

    </div>

    <!-- template scripts -->
    <?php include('module/js.php') ?>


    <script>
        $(".data-slider").owlCarousel({
            
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
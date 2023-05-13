
<?php 

    $orders_class = new orders_controller();

  

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

   
        
        <!-- HEAD -->
        <?php include('module/header.php')?>
        <!-- END HEAD -->

        <div class="container"> <!--chỉnh phần thanh toán-->
            <div class="list-warper">
                <h2 class="list-title">Liên Hệ</h2>
                <div class="row cart p-2">
                    
                    <div class="offset-md-2 col-md-8">

                        <form action="" method=echo"post">

    <div class="form-group">
                                <label for="Orders_Phone">Điện thoại</label>
                                <small class="d-block text-red"><?php if(isset($error['Orders_Phone'])) echo $error['Orders_Phone']?></small>
                                <input type="text" class="form-control" name="Orders_Phone" placeholder="Nhập điện thoại" id="Orders_Phone"value="<?=$post['Orders_Phone']?>">
                            </div>
							 <div class="offset-md-2 col-md-8 text-center">
                                <button type="submit" class="finaltotal" name="submit" value="sent">Gửi</button>
								
                            </div>
							 <div class="offset-md-2 col-md-8 text-center">
                                <button type="submit" class="finaltotal" name="submit" value="reset">hủy</button>
								
                            </div>
							 </form>
                    </div>

                    
                </div>
            </div>

        </div>
		
<?php
	
	$host = "localhost";
$username = "root";
$password = "";
$dbname = "qlbh_electron";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT Orders_ID, Orders_Name, Orders_Phone, Orders_Email, Orders_Address, Orders_Mess FROM orders";
$result = $conn->query($sql);


?>                         
                          
							
                       
		

		
        <?php include('module/footer.php') ?>

    



    <!-- template scripts -->
    <?php include('module/js.php') ?>

</body>
</html>
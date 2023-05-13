<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formneon/style.css">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/death.jpg">
    <title>Liên hệ | Get Electron</title>
</head>
<body>
    <div class="wrapper">
        <form action="cont.php" method="post">
            <h2>Liên hệ | Get Electron</h2>
			
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="person"></ion-icon>
                </span>
                <input type="text" 
                placeholder="Họ và tên" required
					   name="Contact_Name" class="input" id="Contact_Name">
            </div>
			
            <div class="input-box">
                <span class="icon">
                    <ion-icon name="call-outline"></ion-icon>
                </span>
                <input type="phone" 
                placeholder="Số điện thoại" required
					   name="Contact_Phone" class="input" id="Contact_Phone">
            </div>
			
			<div class="input-box">
                <span class="icon">
                   <ion-icon name="mail-outline"></ion-icon>
                </span>
                <input type="Email" 
                placeholder="Email" required
					   name="Contact_Email" class="input" id="Contact_Email">
            </div>
			
          
			<div class="input-box">
                <span class="icon">
                    <ion-icon name="chatbox-ellipses-outline"></ion-icon>
                </span>
                <input type="text" 
                placeholder="Lời nhắn" required
					   name="Contact_Message" class="input" id="Contact_Message">
            </div>
			
            <button type="submit" name="btn_submit" class="submit" value="Gửi">Gửi</button>
            <div class="registration-link">
                <p> <a href="index.php">Về trang chủ</a></p>
            </div>
        </form>
    </div>
<?php
		$link=mysqli_connect('localhost', 'root', '', 'qlbh_electron');
		
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$Contact_Name=$_POST['Contact_Name'];
	
	$Contact_Phone=$_POST['Contact_Phone'];
	$Contact_Email=$_POST['Contact_Email'];
	$Contact_Message= $_POST['Contact_Message'];
	
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($Contact_Name== "" || $Contact_Phone == "" ||  $Contact_Email == "" || $Contact_Message == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO contact(
	    					Contact_Name,
	    					Contact_Phone,
	    					
						    Contact_Email,
							Contact_Message
							
	    					) VALUES (
	    					'$Contact_Name',
	    					'$Contact_Phone',
						    
	    					'$Contact_Email',
							'$Contact_Message'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($link,$sql);
				   		echo "Get Electron đã nhận được phản hồi của bạn ! ";
					}
									    
					
			  }
	
	?>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
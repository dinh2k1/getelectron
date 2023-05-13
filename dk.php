<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formbg/formbg.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/death.jpg">
    <title>Get Electron  | Đăng ký</title>
 
</head>
<body>
	<form action="dk.php" method="post">
		
   <div class="box">
    <div class="container">

        <div class="top">
            <span>Chưa có tài khoản?</span>
            <header>Đăng ký</header>
        </div>

        <div class="input-field">
            <input type="text" name="tennd" class="input" placeholder="Username" id="tennd">
            <i class='bx bx-user' ></i>
        </div>

        <div class="input-field">
            <input type="Password" name="pass" class="input" placeholder="Password" id="pass">
            <i class='bx bx-lock-alt'></i>
        </div>
		
		<div class="input-field">
            <input type="Email" name="email" class="input" placeholder="Email" id="email">
            <i class='bx bx-envelope'></i>
        </div>

        <div class="input-field">
            <input type="submit" name="btn_submit" class="submit" value="Đăng ký">
		</div>
		
		<div class="registration-link">
                <p> <a href="index.php">Về trang chủ</a></p>
            </div>
		
		</br></br>
<?php
		$link=mysqli_connect('localhost', 'root', '', 'qlbh_electron');
		
		if (isset($_POST["btn_submit"])) {
  			//lấy thông tin từ các form bằng phương thức POST
  			$tennd=$_POST['tennd'];
	
	$pass=MD5($_POST['pass']);
	$email=$_POST['email'];
	
	
  			//Kiểm tra điều kiện bắt buộc đối với các field không được bỏ trống
			  if ($tennd== "" || $pass == "" ||  $email == "") {
				   echo "bạn vui lòng nhập đầy đủ thông tin";
  			}else{
  					// Kiểm tra tài khoản đã tồn tại chưa
  					$sql="select * from nguoidung where tennd='$tennd'";
					$kt=mysqli_query($link, $sql);

					if(mysqli_num_rows($kt)  > 0){
						echo "Tài khoản đã tồn tại";
					}else{
						//thực hiện việc lưu trữ dữ liệu vào db
	    				$sql = "INSERT INTO nguoidung(
	    					tennd,
	    					password,
	    					
						    email
	    					) VALUES (
	    					'$tennd',
	    					'$pass',
						    
	    					'$email'
	    					)";
					    // thực thi câu $sql với biến conn lấy từ file connection.php
   						mysqli_query($link,$sql);
				   		echo "chúc mừng bạn đã đăng ký thành công";
					}
									    
					
			  }
	}
	?>
        
    </div>
</div>  
	

</body>
</html>
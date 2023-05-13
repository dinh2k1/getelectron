
		
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
<link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/death.jpg">
    <title>Get Electron  | Đăng nhập</title>
 
</head>
<body>
	<form action="dn.php" method="post">
   <div class="box">
    <div class="container">

        <div class="top">
            <span>Nhập thông tin </span>
            <header>Đăng nhập</header>
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
			<input type="submit" name="btn_submit" class="submit" value="Đăng nhập"></br></br>

	<?php
	
	$link=mysqli_connect('localhost', 'root', '', 'qlbh_electron');
	// Kiểm tra nếu người dùng đã ân nút đăng nhập thì mới xử lý
	if (isset($_POST["btn_submit"])) {
		// lấy thông tin người dùng
			$tennd=$_POST['tennd'];
	
	        $pass=$_POST['pass'];
		//làm sạch thông tin, xóa bỏ các tag html, ký tự đặc biệt 
		//mà người dùng cố tình thêm vào để tấn công theo phương thức sql injection
		$tennd = strip_tags($tennd);
		$tennd = addslashes($tennd);
		$pass = strip_tags($pass);
		$pass = addslashes($pass);
		if ($tennd == "" || $pass =="") {
			echo "tennd hoặc pass bạn không được để trống!";
		}else{
			$sql = "select * from nguoidung where tennd = '$tennd' and password = '$pass' ";
			$query = mysqli_query($link,$sql);
			$num_rows = mysqli_num_rows($query);
			if ($num_rows==0) {
				echo "tên đăng nhập hoặc mật khẩu không đúng !";
			}else{
				//tiến hành lưu tên đăng nhập vào session để tiện xử lý sau này
				$_SESSION['tennd'] = $tennd;
                // Thực thi hành động sau khi lưu thông tin vào session
                // ở đây mình tiến hành chuyển hướng trang web tới một trang gọi là index.php
                header('Location: index.php');
			}
		}
	}
?>

        
    </div>
</div>  
</body>
</html>
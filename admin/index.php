<!--giao diện trang admin-->

<?php require_once('../lib/atz.php');?>
<?php 
	$atz = new atz();
	$atz->check_login();
	$atz->logout();
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title> quan đình </title>
		
		<?php include('module/head.php')?>
		
	</head>
	
	<body class="">

		

		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<?php include('module/nav.php')?>
		<!-- END NAVIGATION -->

		

			
			
		
	</body>

</html>
<?php 

include 'dangky.php';
if(isset($_POST['submit']))
{
	$tennd=$_POST['tennd'];
	
	$pass=MD5($_POST['pass']);
	$email=$_POST['email'];
	$ngaysinh=$_POST['ngaysinh'];
	$gioitinh=$_POST['gioitinh'];
	$dienthoai=$_POST['dienthoai'];
	$diachi=$_POST['diachi'];
$link=mysqli_connect('localhost', 'root', '', 'qlbh_electron');
	//Lay gio cua he thong
	$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
	//Lay ngay cua he thong
	$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
	
	$query="INSERT INTO nguoidung VALUES('','$tennd',  '$pass','$ngaysinh','$gioitinh', '$email','$dienthoai',   	 			'$diachi','$ngay', '')";
	
	mysqli_query($link,$query);
	mysqli_close($link);	 
		
}

?>

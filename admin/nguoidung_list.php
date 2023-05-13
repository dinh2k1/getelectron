
<?php require_once('nguoi_c/nguoidung_c.php');?>

<?php 
	$nguoidung_class = new nguoidung_controller();
	$list_nguoidungs= $nguoidung_class->get_nguoidung();
	
?>





<!doctype html>
<html>
<head>
	<title> Danh sách người dùng </title>
		
		<?php include('module/head.php')?>
<!-- #BODY -->

	<body class="">

		

		<!-- #NAVIGATION -->
		<!-- Left panel : Navigation area -->
		<!-- Note: This width of the aside area can be adjusted through LESS variables -->
		<?php include('module/nav.php')?>
		<!-- END NAVIGATION -->

		<!-- MAIN PANEL -->
		<div id="main" role="main">

			

			<!-- MAIN CONTENT -->
			<div id="content">
				<div class="row">
					
					</div>
				</div>

				<!-- widget grid -->
				<section id="widget-grid" class="">

					<!-- row -->
					<div class="row">

						<!-- NEW WIDGET START -->
						<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

							<!-- Widget ID (each widget will need unique ID)-->
							<div class="jarviswidget jarviswidget-color-blueDark" id="wid-id-0" data-widget-editbutton="false">
								
								<!-- widget div-->
								<div>

									<!-- widget edit box -->
									<div class="jarviswidget-editbox">
										<!-- This area used as dropdown edit box -->

									</div>
									<!-- end widget edit box -->

									
										<div class="table-responsive">
										
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
														<th class="text-center">idnd</th>
														<th>tennd</th>
														
														<th>password</th>
														
														
														<th>email</th>
														
														
														
													
													</tr>
												</thead>
												<tbody>
													<?php if (!empty($list_nguoidungs)): ?>
														<?php foreach ($list_nguoidungs as $v):?>
															<tr>
																<td class="text-center"><?php echo $v['idnd']?></td>
																<td><?php echo $v['tennd']?></td>
																<td><?php echo $v['password']?></td>
																
																
																<td><?php echo $v['email']?></td>
																
																
																
															
															</tr>	
														<?php endforeach ?>
													<?php else:?>
														<tr>
															<td colspan="4" class="text-center">Chưa có dữ liệu</td>
														</tr>	
													<?php endif ?>
													
												</tbody>
											</table>
											
										</div>
									</div>
									<!-- end widget content -->

								</div>
								<!-- end widget div -->

							</div>
							<!-- end widget -->

						</article>
						<!-- WIDGET END -->

					</div>

					<!-- end row -->

					<!-- row -->

				</section>
				<!-- end widget grid -->
			</div>
			<!-- END MAIN CONTENT -->

		</div>
		<!-- END MAIN PANEL -->
		<!-- MAIN JS -->
		<?php include('module/js.php')?>

		<!-- PAGE RELATED PLUGIN(S) -->
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

$sql = "SELECT idnd, tennd, password, ngaysinh, gioitinh, email, dienthoai, diachi, ngaydangky FROM nguoidung";
$result = $conn->query($sql);


?>

		<script type="text/javascript">
		// DO NOT REMOVE : GLOBAL FUNCTIONS!
		$(document).ready(function() {
			pageSetUp();
		})

		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<?php //include('module/google_analytics.php')?>

	</body>

</html>
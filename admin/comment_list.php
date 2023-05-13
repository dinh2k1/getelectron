<?php require_once('comments_c/comment_c.php');?>

<?php 
	$comment_class = new comment_controller();
	$list_comments= $comment_class->get_comment();
	
?>


<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title> Danh sách bình luận </title>
		
		<?php include('module/head.php')?>

	</head>
	
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
												<b>*Lưu ý phần đánh giá của khách hàng</br>
													+1 <=> 1sao</br>
													+2 <=>  2sao</br>
													+3 <=>  3sao</br>
													+4 <=>  4sao </br>
													+5 <=>  5sao</b></br>
											</br>
												<thead>
													<tr>
														<th class="text-center">ID</th>
														<th>tên khách hàng</th>
														<th>Nội dung</th>
														<th>số điện thoại</th>
														<th>Email</th>
														<th>Giới tính</th>
														<th>Tên sản phẩm</th>
														
														<th>Đánh giá của khách hàng</th>
														
													</tr>
												</thead>
												<tbody>
													<?php if (!empty($list_comments)): ?>
														<?php foreach ($list_comments as $v):?>
															<tr>
																<td class="text-center"><?=$v['com_id']?></td>
																<td><?php echo $v['tenkhach']?></td>
																
																	<td><?php echo $v['com_desc']?></td>
																	<td><?php echo $v['dienthoai']?></td>
																<td><?php echo $v['email']?></td>
																<td><?php echo $v['gioitinh']?></td>
																<td><?php echo $v['tensp']?></td>
																
																<td><?php echo $v['danhgia']?></td>
																
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

		
		<!-- SHORTCUT AREA : With large tiles (activated via clicking user name tag)
		Note: These tiles are completely responsive,
		you can add as many as you like
		-->
		<div id="shortcut">
			<ul>
				<li>

					<a href="inbox.html" class="jarvismetro-tile big-cubes bg-color-blue"> <span class="iconbox"> <i class="fa fa-envelope fa-4x"></i> <span>Mail <span class="label pull-right bg-color-darken">14</span></span> </span> </a>
				</li>
				<li>
					<a href="calendar.html" class="jarvismetro-tile big-cubes bg-color-orangeDark"> <span class="iconbox"> <i class="fa fa-calendar fa-4x"></i> <span>Calendar</span> </span> </a>
				</li>
				<li>
					<a href="gmap-xml.html" class="jarvismetro-tile big-cubes bg-color-purple"> <span class="iconbox"> <i class="fa fa-map-marker fa-4x"></i> <span>Maps</span> </span> </a>
				</li>
				<li>
					<a href="invoice.html" class="jarvismetro-tile big-cubes bg-color-blueDark"> <span class="iconbox"> <i class="fa fa-book fa-4x"></i> <span>Invoice <span class="label pull-right bg-color-darken">99</span></span> </span> </a>
				</li>
				<li>
					<a href="gallery.html" class="jarvismetro-tile big-cubes bg-color-greenLight"> <span class="iconbox"> <i class="fa fa-picture-o fa-4x"></i> <span>Gallery </span> </span> </a>
				</li>
				<li>
					<a href="profile.html" class="jarvismetro-tile big-cubes selected bg-color-pinkDark"> <span class="iconbox"> <i class="fa fa-user fa-4x"></i> <span>My Profile </span> </span> </a>
				</li>
			</ul>
		</div>
		<!-- END SHORTCUT AREA -->

		<!--================================================== -->

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

$sql = "SELECT com_id, com_desc, tenkhach, dienthoai, email, gioitinh, tensp, danhgia FROM comment";
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
<!--phần thêm danh sách đơn hàng-->

<?php require_once('orders_c/orders_c.php');?>

<?php 
	$orders_class = new orders_controller();

	$orders_class->add_orders();

	$post = $orders_class->post;
	
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title> danh sách đơn hàng </title>
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

				<!-- row -->
				<div class="row">
					
					
					</div>
					<!-- end col -->
					
				</div>
				<!-- end row -->
				
				<!--
					The ID "widget-grid" will start to initialize all widgets below 
					You do not need to use widgets if you dont want to. Simply remove 
					the <section></section> and you can use wells or panels instead 
					-->
				
					<!-- widget grid -->
					<section id="widget-grid" class="">

						<!-- row -->
						<div class="row">

							<!-- NEW WIDGET ROW START -->
							<div class="col-md-offset-3 col-sm-6">
						
								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
									
									
									<!-- widget div-->

									<div>
										<!-- widget edit box -->
										<div class="jarviswidget-editbox">
											<!-- This area used as dropdown edit box -->
											<input class="form-control" type="text">
										</div>
										<!-- end widget edit box -->

										<!-- widget content -->
										<div class="widget-body">

											<form id="catForm" action="" method="post">

												<fieldset>
													<legend>
														Cập nhật trạng thái dơn hàng
													</legend>
													<div class="form-group">
														<label>Chủ đơn hàng</label>
														<input type="text" class="form-control" name="Orders_Name" value="<?=$post['Orders_Name']?>" disabled />
													</div>
												</fieldset>
												<fieldset>
													<div class="form-group">
														<label for="Orders_Status">Trạng thái</label>
														<select name="Orders_Status" id="Orders_Status" class="form-control">
															<option value="0" <?php if($post['Orders_Status']==0){echo 'selected';}?>>Đơn hàng mới</option>
															<option value="1" <?php if($post['Orders_Status']==1){echo 'selected';}?>>Đang vận chuyển</option>
															<option value="2" <?php if($post['Orders_Status']==2){echo 'selected';}?>>Đã thanh toán</option>
														</select>
													</div>
												</fieldset>

												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<button class="btn btn-default" type="submit" name="submit">
																<i class="fa fa-save"></i> xong
															</button>
														</div>
													</div>
												</div>
												
											</form>

										</div>
										<!-- end widget content -->

									</div>
									<!-- end widget div -->

								</div>
								<!-- end widget -->

							
							</div>
							<!-- WIDGET ROW END -->

						</div>

						<!-- end row -->

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

		<!-- PAGE RELATED PLUGIN(S)-->

		<script src="js/plugin/bootstrapvalidator/bootstrapValidator.min.js"></script>

		<script type="text/javascript">

			$(document).ready(function() {
				
				pageSetUp();
				
				// cat form

				// $('#catForm').bootstrapValidator({
				// 	feedbackIcons : {
				// 		valid : 'glyphicon glyphicon-ok',
				// 		invalid : 'glyphicon glyphicon-remove',
				// 		validating : 'glyphicon glyphicon-refresh'
				// 	},
				// 	fields : {
				// 		Cat_Name : {
				// 			validators : {
				// 				notEmpty : {
				// 					message : 'Trường này không được để trống'
				// 				}
				// 			}
				// 		},
				// 		Cat_Order : {
				// 			validators : {
				// 				digits : {
				// 					message : 'Chỉ được nhập số'
				// 				}
				// 			}
				// 		}
				// 	},	
				// });
			})
		
		</script>

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<?php //include('module/google_analytics.php')?>

	</body>

</html>
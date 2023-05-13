<?php require_once('login_c/login_c.php');?>

<?php 
	$login_class = new login_controller();

	$rs = $login_class->login();
?>

<!DOCTYPE html>
<html lang="en-us">
	<head>
		<title>Đăng nhập</title>
		<?php include('module/head.php')?>

	</head>
	
	<!-- #BODY -->
	<body class="">

		<!-- #HEADER -->
		<header id="header">
			<?php include('module/header.php')?>
		</header>
		<!-- END HEADER -->

		<!-- MAIN PANEL -->
		<div id="main" role="main" style="margin-top: 100px; margin-left: 0">

			<!-- MAIN CONTENT -->
			<div id="content">
				
					<!-- widget grid -->
					<section id="widget-grid" class="">

						<!-- row -->
						<div class="row">

							<!-- NEW WIDGET ROW START -->
							<div class="col-md-offset-4 col-sm-4">
						
								<!-- Widget ID (each widget will need unique ID)-->
								<div class="jarviswidget" id="wid-id-5" data-widget-colorbutton="false"	data-widget-editbutton="false" data-widget-deletebutton="false" data-widget-sortable="false">
									
									<header>
										<h2><strong>Đăng nhập</strong></h2>
									</header>

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

											<form id="loginForm" action="" method="post">
												<fieldset>
													<div class="form-group <?php if (isset($rs['error']['main'])){echo 'has-error';} ?>">
													<?php if (isset($rs['error']['main'])): ?>
														<p class="help-block"><?=$rs['error']['main']?></p>
													<?php endif ?>
													</div>
												</fieldset>

												<fieldset>
													<div class="form-group <?php if (isset($rs['error']['User_Name'])){echo 'has-error';} ?>">
														<label class="control-label">Tên đăng nhập<span class="text-red">*</span></label>
														<?php if (isset($rs['error']['User_Name'])): ?>
															<small class="help-block"><?=$rs['error']['User_Name'] ?></small>
														<?php endif ?>
														<input type="text" class="form-control" name="User_Name" value=""/>
													</div>
												</fieldset>
												<fieldset>
													<div class="form-group <?php if (isset($rs['error']['User_Pass'])){echo 'has-error';} ?>">
														<label class="control-label">Password<span class="text-red">*</span></label>
														<?php if (isset($rs['error']['User_Pass'])): ?>
															<small class="help-block"><?=$rs['error']['User_Pass'] ?></small>
														<?php endif ?>
														<input type="password" class="form-control" name="User_Pass" value="" />
													</div>
												</fieldset>

												<div class="form-actions">
													<div class="row">
														<div class="col-md-12">
															<button class="btn btn-default" type="submit" name="submit">
																<i class="fa fa-sign-in"></i> Đăng nhập
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

		<!-- PAGE FOOTER -->
		<?php include('module/footer.php')?>
		<!-- END PAGE FOOTER -->

		<!--================================================== -->

		<!-- MAIN JS -->
		<?php include('module/js.php')?>

		<!-- PAGE RELATED PLUGIN(S)-->

		<!-- Your GOOGLE ANALYTICS CODE Below -->
		<?php //include('module/google_analytics.php')?>

	</body>

</html>
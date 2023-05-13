<!--phần giao diện trang đăng nhập-->

<?php require_once('login_c/login_c.php');?>
<?php 
	$login_class = new login_controller();

	$rs = $login_class->login();
?>
<!DOCTYPE html>
<html lang="en-us" id="extr-page">
	<head>
		<title>Đăng nhập</title>
		<?php include('module/head.php')?>
	</head>
	
	

		
		<div id="main" role="main">

			<!-- MAIN CONTENT -->
			<div id="content" class="container">

				<div class="row">
					
						<h1 class="txt-color-red login-header-big">welcome back</h1>
						

						

					</div>
					<div class="col-xs-12 col-sm-12 col-md-5 col-lg-4">
						<div class="well no-padding">
							<form action="" id="login-form" class="smart-form client-form" method="post">
								<header>
									Đăng nhập
								</header>

								<fieldset>
									
									<section>
										<label class="label" for="User_Name">Tên đăng nhập</label>
										<label class="input"> <i class="icon-append fa fa-user"></i>
											<input type="text" name="User_Name" id="User_Name">
											<b class="tooltip tooltip-top-right"><i class="fa fa-user txt-color-teal"></i>please enter the login name</b></label>
									</section>

									<section>
										<label class="label" for="User_Pass">Password</label>
										<label class="input"> <i class="icon-append fa fa-lock"></i>
											<input type="password" name="User_Pass" id="User_Pass">
											<b class="tooltip tooltip-top-right"><i class="fa fa-lock txt-color-teal"></i> Mời nhập password</b> </label>
										
									</section>

									
								</fieldset>
								<footer>
									<button type="submit" name="submit" class="btn btn-primary">
										Đăng nhập
									</button>
								</footer>
							</form>

						</div>
						
						<!-- <h5 class="text-center"> - Or sign in using -</h5>
															
						<ul class="list-inline text-center">
							<li>
								<a href="javascript:void(0);" class="btn btn-primary btn-circle"><i class="fa fa-facebook"></i></a>
							</li>
							<li>
								<a href="javascript:void(0);" class="btn btn-info btn-circle"><i class="fa fa-twitter"></i></a>
							</li>
							<li>
								<a href="javascript:void(0);" class="btn btn-warning btn-circle"><i class="fa fa-linkedin"></i></a>
							</li>
						</ul> -->
						
					</div>
				</div>
			</div>

		</div>

		<!--================================================== -->	

		<!-- PACE LOADER - turn this on if you want ajax loading to show (caution: uses lots of memory on iDevices)-->
		<script src="js/plugin/pace/pace.min.js"></script>

	    <!-- Link to Google CDN's jQuery + jQueryUI; fall back to local -->
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script> if (!window.jQuery) { document.write('<script src="js/libs/jquery-2.1.1.min.js"><\/script>');} </script>

	    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script> if (!window.jQuery.ui) { document.write('<script src="js/libs/jquery-ui-1.10.3.min.js"><\/script>');} </script>

		<!-- IMPORTANT: APP CONFIG -->
		<script src="js/app.config.js"></script>

		<!-- JS TOUCH : include this plugin for mobile drag / drop touch events 		
		<script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script> -->

		<!-- BOOTSTRAP JS -->		
		<script src="js/bootstrap/bootstrap.min.js"></script>

		<!-- JQUERY VALIDATE -->
		<script src="js/plugin/jquery-validate/jquery.validate.min.js"></script>
		
		<!-- JQUERY MASKED INPUT -->
		<script src="js/plugin/masked-input/jquery.maskedinput.min.js"></script>
		
		<!--[if IE 8]>
			
			<h1>Your browser is out of date, please update your browser by going to www.microsoft.com/download</h1>
			
		<![endif]-->

		<!-- MAIN APP JS FILE -->
		<script src="js/app.min.js"></script>

		<script type="text/javascript">
			runAllForms();

			$(function() {
				// Validation
				$("#login-form").validate({
					// Rules for form validation
					rules : {
						email : {
							required : true,
							email : true
						},
						password : {
							required : true,
							minlength : 3,
							maxlength : 20
						}
					},

					// Messages for form validation
					messages : {
						email : {
							required : 'Please enter your email address',
							email : 'Please enter a VALID email address'
						},
						password : {
							required : 'Please enter your password'
						}
					},

					// Do not change code below
					errorPlacement : function(error, element) {
						error.insertAfter(element.parent());
					}
				});
			});
		</script>

	</body>
</html>
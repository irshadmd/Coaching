<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location:home.php');
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
	<div class="limiter">
		<div class="container-login100" style="background-image: url('../images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" form action="login.php" method="POST">
					<span class="login100-form-logo">
						<i class="zmdi zmdi-account-add"></i>
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Admin Log in
					</span>
					<?php
					if (isset($_SESSION['error'])) {
						echo "
									<div class='callout callout-danger text-center mt20'>
									<p style='color:white' >" . $_SESSION['error'] . "</p>
								</div>
								";
						unset($_SESSION['error']);
					}
					?>
					<div class="wrap-input100 validate-input" data-validate="Enter Username">
						<input class="input100" type="text" name="username" >
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password" name="password" >
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button type="submit" name="adminlogin" class="login100-form-btn"><i class="fa fa-sign-in"></i> &nbsp Login</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>
	<?php include 'includes/scripts.php' ?>
</body>

</html>
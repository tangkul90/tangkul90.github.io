<!-- login-page -->
	<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Login to your account</h3>  



			<div class="login-body">
				<form action="content/customer/proses_login.php" method="post">
				 <?php if(isset($_GET['login']) && $_GET['login'] =="error"){ ?> 
                     <br />
                <div class="alert alert-danger" role="alert">
					<strong>Login Error !</strong> Silahkan cek kombinasi email dan password.
			   </div>
               <?php }elseif(isset($_GET['register']) && $_GET['register'] =="success"){?>
                  <br />
                <div class="alert alert-success" role="alert">
					<strong>Register Success !</strong> Silahkan Login untuk Kehalaman Customer.
			   </div>
               <?php }elseif(isset($_GET['password']) && $_GET['password'] =="success"){?>
                  <br />
                <div class="alert alert-success" role="alert">
					<strong>Ganti Password Success !</strong> Silahkan Login Password Baru Anda.
			   </div>
               <?php }?>
					<input type="text" class="user" name="email" placeholder="Enter your email" required="">
					<input type="password" name="password" class="lock" placeholder="Password" required="">
					<input type="submit" value="Login">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6> Not a Member? <a href="index.php?mod=customer&pg=register">Sign Up Now »</a> </h6> 
			
		</div>
	</div>
	<!-- //login-page --> 
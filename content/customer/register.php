<div class="login-page">
		<div class="container"> 
			<h3 class="w3ls-title w3ls-title1">Create your account</h3>  
			<div class="login-body">
				<form action="content/customer/proses_register.php" method="post">
					<input type="text" class="user" name="nama" placeholder="Masukkan Nama" required="">
					<input type="text" class="user" name="email" placeholder="Masukkan email" required="">
					<input type="password" name="password" class="lock" placeholder="Password" required="">
                    <input type="text" class="user" name="telpon" placeholder="Masukkan Telpon" required="">
                    <input type="text" class="user" name="alamat" placeholder="Masukkan Alamat" required="">
					<input type="submit" value="Sign Up ">
					<div class="forgot-grid">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Remember me</label>
						<div class="forgot">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>  
			<h6>Already have an account? <a href="index.php?mod=customer&pg=login">Login Now »</a> </h6>  
		</div>
	</div>

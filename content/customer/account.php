<?php

if(empty($_SESSION['email'])){
echo "<script>alert ('Silahkan Login, Untuk Melihat Account...!!!');document.location='index.php?mod=customer&pg=login' </script>"; 
}else{
$account = mysqli_query($connect, "SELECT * FROM customer WHERE email='".$_SESSION['email']."'");
$data_account=mysqli_fetch_array($account);
}
?>
<div class="container"> 
		<ol class="breadcrumb breadcrumb1">
			<li><a href="index.html">Home</a></li>
			<li class="active">Account</li>
		</ol> 
		<div class="clearfix"> </div>
	</div>
	<!-- //breadcrumbs -->
	<!-- products -->
	<div class="products">	 
		<div class="container">  
			
<div>
<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>Nama Lengkap : <?php echo $data_account['nama']; ?></label>
	
	</div>
	<div class="form-group">
<label>Email : <?php echo $data_account['email']; ?></label>
	
	</div>
	<div class="form-group">
<label>No Telepon : <?php echo $data_account['no_telpon']; ?></label>
	
	</div>
<div class="form-group">
<label>Alamat : <?php echo $data_account['alamat']; ?></label>
	
	</div>
	<div class="form-group">
	<button type="button" class="btn btn-warning" style="width: 150px;" data-toggle="modal" data-target="#profil" ><i class="fa fa-pencil"></i> Edit Profil</button> 
	<button type="button" class="btn btn-danger" style="width: 150px;" data-toggle="modal" data-target="#password"><i class="fa fa-key"></i> Ganti Password</button>
	</div></div>
<div class="col-md-6">
<div class="alert alert-success" role="alert">
					<strong>Hay, <?php echo $data_account['nama']; ?> !</strong> Selamat datang di halaman Account anda, silahkan lihat data Profil anda di samping.!
					<h3>
	Tanggal : <?php echo date ("d - m - Y");?></h3>
			   </div>

<a href="index.php?mod=produk&pg=produk"> <button type="button" class="btn-lg btn-success" ><i class="fa fa-shopping-cart"></i> Mulai Belanja</button></a>

</div>
</div>
</div>
				
				
				   <div class="clearfix"> </div>  
				</div>
			
		</div>
	</div>
	<!--//products--> 

	<!-- edit Profil-->         
  <div id="profil" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/customer/edit_profil.php?action=profil">
 <input type="hidden" name="id" value="<?php echo $data_account['id_customer'] ; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profil</h4>
      </div>
      <div class="modal-body">
       <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap :</label>
                      <input type="text" name="nama" value="<?php echo $data_account['nama'] ; ?>" class="form-control" id="">
                    </div>
                     
                     <div class="form-group">
                      <label for="exampleInputEmail1">Email :</label>
                      <input type="email" name="email" value="<?php echo $data_account['email'] ; ?>" class="form-control" id="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Kontak :</label>
                      <input type="text" name="kontak" value="<?php echo $data_account['no_telpon'] ; ?>" class="form-control" id="">
                    </div>
                    
                    <div class="form-group">
                      <label for="exampleInputEmail1">Alamat :</label>
                      <textarea name="alamat" class="form-control"><?php echo $data_account['alamat'] ; ?></textarea>
                    </div>
                                                             
                     </div><!-- /.box-body --></p>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-warning">Update Profil</button>
      </div>
    </div></form>

  </div>
</div>
  <!-- akhir edit profile--> 

  <!-- edit password-->         
  <div id="password" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/customer/edit_profil.php?action=password">
 <input type="hidden" name="email" value="<?php echo $data_account['email'] ; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Password</h4>
      </div>
      <div class="modal-body">
       <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email :</label>
                      <input type="text" name="email" disabled value="<?php echo $data_account['email'] ; ?>" class="form-control" id="">
                    </div>
                     
                     <div class="form-group">
                      <label for="exampleInputEmail1">Password Lama :</label>
                      <input type="password" name="password_l" value="" class="form-control" id="">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Password Baru :</label>
                      <input type="password" name="password_b" value="" class="form-control" id="">
                    </div>
                                                             
                     </div><!-- /.box-body --></p>
       
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger">Update Password</button>
      </div>
    </div></form>

  </div>
</div>
  <!-- akhir edit password--> 
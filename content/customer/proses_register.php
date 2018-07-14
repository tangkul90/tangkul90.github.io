<?php 
include"../../admin/config/koneksi.php";
$nama=$_POST['nama'];
$email=$_POST['email'];
$password=$_POST['password'];
$alamat=$_POST['alamat'];
$phone=$_POST['telpon'];

					 
					 $sql="insert into customer 
					(email,password,nama,no_telpon,alamat) 
					values('$email','$password','$nama','$phone','$alamat')";             
					$res=mysqli_query($connect, $sql) or die ("error"); 
					
					echo "<script>alert ('Register Customer Success, Silahkan Login untuk masuk ke halaman customer...!!!');document.location='../../index.php?mod=customer&pg=login&register=success' </script>"; 
	?>
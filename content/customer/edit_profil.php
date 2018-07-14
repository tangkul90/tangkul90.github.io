<?php
include('../../admin/config/koneksi.php');
  if ($_GET['action']=="profil") { 
  $id  =$_POST['id'];    
	$nama  =$_POST['nama']; 
	$kontak  =$_POST['kontak'];
	$email  =$_POST['email'];
	$alamat  =$_POST['alamat'];   

					  $sqlp=mysqli_query($connect,"UPDATE customer SET
					nama='$nama',
					email='$email',
					no_telpon='$kontak',
					alamat='$alamat'
					 WHERE id_customer='$id'
					"            
					) or die ("error");  
					
					echo "<script>alert ('Profil Sudah di Simpan, Silahkan Login kembali');document.location='logout.php' </script>"; 
					} 
					elseif($_GET['action']=="password"){   
$pass_l=$_POST['password_l'];
$pass_b=$_POST['password_b'];
$email=$_POST['email'];
$cari=mysqli_query($connect, "SELECT * FROM customer WHERE email='$email' and password='$pass_l'");
if(mysqli_num_rows($cari)==1){
 $sqlp=mysqli_query($connect,"UPDATE customer SET
					password='$pass_b'
					 WHERE email='$email'
					"            
					) or die ("error");  
					  echo "<script>alert ('Password Sudah Di Ganti, silahkan Login Kembali dengan password baru!!');document.location='logout.php' </script>"; 
				} else{
					 echo "<script>alert ('Password Anda Salah Silahkan isi dengan bener!');document.location='../../index.php?mod=customer&pg=account' </script>"; 
				}
}
?>

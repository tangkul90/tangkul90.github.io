<?php
include('../../config/koneksi.php');
$username  =$_POST['username']; 
$password  =$_POST['password']; 
$password_b  =$_POST['password_b']; 
$pass_sql=mysqli_query($connect, "select * from admin where username='$username' and password='".md5($password)."'");
if(mysqli_num_rows($pass_sql)==1){

$query = mysqli_query($connect, "update admin set 
 password='".md5($password_b)."'
  where username='$username'") or die('error');
echo "<script>alert ('Password Sudah Di Ganti, Silahkan Login Ulang dengan Password Baru Anda !!!');document.location='../logout.php' </script>"; 
}else{
echo "<script>alert ('Password Anda Salah, Silahkan Ulangi Lagi!!!');document.location='../../index.php?mod=user&pg=profil' </script>"; 
	
}

?>
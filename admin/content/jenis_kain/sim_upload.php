<?php
include('../../config/koneksi.php');
$nama=$_POST['nm_jenis_kain'];

 $sql="insert into jenis_kain (nm_jenis_kain) 
					values('$nama')";             
					$res=mysqli_query($connect,$sql) or die ("error");  
					echo "<script>alert ('Data Jenis Kain sudah di Simpan ');document.location='../../index.php?mod=jenis_kain&pg=data_jenis' </script>";
					 ?>
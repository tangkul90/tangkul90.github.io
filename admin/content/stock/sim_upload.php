<?php
include('../../config/koneksi.php');
$motif=$_POST['motif'];
$jumlah=$_POST['jumlah'];

 $sql="insert into kain_masuk (kd_motif,tgl_kain_masuk,jmlh_kain_masuk) 
					values('$motif','".date("Y-m-d")."','$jumlah')";             
					$res=mysqli_query($connect,$sql) or die ("error stock");  
if($res==true){
$query = mysqli_query($connect,"update motif set 
 stock=stock+'$jumlah' where kd_motif='$motif'") or die('error motif');
					

					echo "<script>alert ('Stock Barang sudah di Simpan ');document.location='../../index.php?mod=stock&pg=data_stock' </script>";
				}
					 ?>
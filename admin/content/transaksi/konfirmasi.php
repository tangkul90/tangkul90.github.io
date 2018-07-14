<?php 
include('../../config/koneksi.php');
$kode=$_GET['kode_pesanan'];
$status=$_GET['status'];
$tanggal=$_GET['tanggal'];
if($status=="Konfirmasi"){
 $sql=mysqli_query($connect,"update detail_pesanan set
					status_order='Lunas' where kode_pesanan='$kode'"            
					) or die ("error");

$select=mysqli_query($connect,"select * from pesanan where kode_pesanan='$kode'")or die("select error");
while($data=mysqli_fetch_array($select)){
	$id_pesanan=$data['id_pesanan'];
	$kd_motif=$data['kd_motif'];
	$qty=$data['jumlah_pesanan'];

	$update1=mysqli_query($connect,"update pesanan set status_pesanan='Lunas' where kode_pesanan='$kode'")or die("select Update");

	$update2=mysqli_query($connect,"insert into laporan (id_pesanan,tanggal) values ('$id_pesanan','$tanggal')")or die("select Update");

	$update=mysqli_query($connect,"update motif set dijual=dijual+'$qty' where kd_motif='$kd_motif'")or die("select Update");
}

 header("Location:../../index.php?mod=transaksi&pg=data_transaksi"); 

					
}elseif($status=="Ditolak"){
 $sql=mysqli_query($connect,"update detail_pesanan set
					status_order='Ditolak' where kode_pesanan='$kode'"            
					) or die ("error");
					
$select=mysqli_query($connect,"select * from pesanan where kode_pesanan='$kode'")or die("select error");
while($data=mysqli_fetch_array($select)){
	$id_pesanan=$data['id_pesanan'];
	$kd_motif=$data['kd_motif'];	
	$qty=$data['jumlah_pesanan'];
$update=mysqli_query($connect,"update pesanan set status_pesanan='Ditolak' where kode_pesanan='$kode'")or die("select Update");

	$update=mysqli_query($connect,"update motif set stock=stock+'$qty' where kd_motif='$kd_motif'")or die("select Update");
}

					header("Location:../../index.php?mod=transaksi&pg=data_transaksi"); 
}
?>
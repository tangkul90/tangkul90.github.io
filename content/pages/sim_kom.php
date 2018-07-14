 <?php
 date_default_timezone_set("Asia/Jakarta");
include"../../admin/config/koneksi.php";
$nama=$_POST['nama'];
$email=$_POST['email'];
$komentar=$_POST['komentar'];

					 
					 $sql="insert into komentar 
					(nama,email,komentar,tanggal) 
					values('$nama','$email','$komentar','".date("Y-m-d")."')";             
					$res=mysqli_query($connect, $sql) or die ("error"); 
					
					echo "<script>alert ('Komentar Sudah Terkirim');document.location='../../index.php?mod=pages&pg=kontak' </script>"; 
					?>
<?php
include('../../config/koneksi.php');
mysqli_query($connect,"DELETE FROM jenis_kain WHERE kd_jenis_kain=".$_GET['id']."")or die ('error');
	header("location:../../index.php?mod=jenis_kain&pg=data_jenis");
	?>
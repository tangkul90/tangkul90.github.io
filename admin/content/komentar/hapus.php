<?php
include('../../config/koneksi.php');
mysqli_query($connect,"DELETE FROM komentar WHERE id_komen=".$_GET['id']."")or die ('error');

	header("location:../../index.php?mod=komentar&pg=data");
	?>
<?php
include('../../config/koneksi.php');
mysqli_query($connect,"DELETE FROM customer WHERE id_customer=".$_GET['id']."")or die ('error');

	header("location:../../index.php?mod=customer&pg=data_customer");
	?>
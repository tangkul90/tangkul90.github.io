<?php
include('../../config/koneksi.php');
mysqli_query($connect,"DELETE FROM pengiriman WHERE id_pengiriman=".$_GET['id']."")or die ('error');
	header("location:../../index.php?mod=pengiriman&pg=data_pengiriman");
	?>
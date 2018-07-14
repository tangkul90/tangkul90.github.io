<?php
$user_sql=mysqli_query($connect, "select * from admin where username='$_SESSION[username]'")or die ('error user ');
$data_us=mysqli_fetch_array($user_sql);

$customer_sql=mysqli_query($connect, "select * from customer order by id_customer")or die ('error user ');
$jum_customer=mysqli_num_rows($customer_sql);

$motif_sql=mysqli_query($connect, "select * from motif order by kd_motif")or die ('error user ');
$jum_motif=mysqli_num_rows($motif_sql);

$pesanan_sql=mysqli_query($connect, "select * from pesanan where status_pesanan='Terkirim' or status_pesanan='Diterima' order by id_pesanan")or die ('error user ');
$jum_penjualan=mysqli_num_rows($pesanan_sql);

$stock_sql=mysqli_query($connect, "select * from kain_masuk order by kd_kain_masuk")or die ('error user ');
$jum_stock=mysqli_num_rows($stock_sql);



?>
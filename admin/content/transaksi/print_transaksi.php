<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Laporan</title>
</head>

<script type=”text/javascript”>
var s5_taf_parent = window.location;
function popup_print(){
window.open('view.php','page','toolbar=0,scrollbars=1,location=0,statusbar=0,menubar=0,resizable=0,width=750,height=600,left=50,top=50,titlebar=yes')
}
</script>
<body onLoad="window.print()">
 <?php 
 include('../../config/koneksi.php');
				    $kode_pesanan=$_GET['kode_pesanan'];
				 
                                    $sql=mysqli_query($connect, "SELECT * FROM detail_pesanan o, customer c where o.id_customer=c.id_customer and kode_pesanan='$kode_pesanan'") or die ("error Order");
          
          $data_or=mysqli_fetch_array($sql);
          
        
         
					 ?><h2 align="center">TENUN STORE</h2>
                     <center>Alamat : Jln. Sudirman, Denpasar, Bali, No Telp : 77347333/77236117</center>
                     <hr color="#000000" size="3" /><hr color="#000000" size="1" />
                     <h3 align="center">Data Pengiriman Barang</h3>
<table width="100%" border="0" cellpadding="5" cellspacing="0" >
<tr>
<th align="left">Nama</th>
<td>: <?php echo $data_or['nama']; ?></td>
<th align="left">Kode Order</th>
<td>: <?php echo $data_or['kode_pesanan']; ?></td>
</tr>
<tr>
<th align="left">Email</th>
<td>: <?php echo $data_or['email']; ?></td>
<th align="left">Tanggal Order</th>
<td>: <?php echo $data_or['tanggal_pesan']; ?></td>
</tr>
<tr>
<th align="left">No Telephone</th>
<td>: <?php echo $data_or['no_telpon']; ?></td>
<th align="left">Status Order</th>
<td>: <?php echo $data_or['status_order']; ?></td>
</tr>
<tr>
<th align="left">Alamat Pengirim</th>
<td>: <?php echo $data_or['alamat']; ?></td>
<td></td>
<td></td>
</tr>
</table>


                      <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered">
        <tr>
                      <th style="width: 10px">#</th>
                      <th>Kode Pesanan</th>
                       <th>Jenis Kain</th>
                      <th>Nama Motif</th>
                       <th>Harga</th>
                        <th>Jumlah</th>
                       
                       <th>Total</th>
                                       </tr>
                   <?php
                                    $sql_p=mysqli_query($connect, "SELECT * FROM pesanan p, motif m, jenis_kain j where p.kd_motif=m.kd_motif and m.kd_jenis_kain=j.kd_jenis_kain and p.kode_pesanan='$data_or[kode_pesanan]'") or die ("error Order");
          $no=1;
          $subtotal=0;
          while($data=mysqli_fetch_array($sql_p)){
            $subtotal +=$data['harga']*$data['jumlah_pesanan'];
          ?>
                               <tr>
                      <td><?php echo $no ; ?></td>
                      <td><?php echo $data['kode_pesanan'] ; ?></td>
                      <td><?php echo $data['nm_jenis_kain'] ; ?></td>
                      <td><?php echo $data['nm_motif'] ; ?></td>
                      <td><?php echo number_format($data['harga']) ; ?></td>
                       <td><?php echo $data['jumlah_pesanan'] ; ?></td>
                        
                        <td><?php $total=($data['harga']*$data['jumlah_pesanan']);  echo number_format($total); ?></td>
                   
                      </tr>              
                   <?php $no++;
            }?>
                      
                  </table>
                  <h2><b>Total Belanja : Rp <?php echo number_format($subtotal); ?></b></h2>
                  <br />
                  <p align="right">Lombok, <?php echo date("d-m-Y"); ?></p>
                  <p align="center">Mengetahui<br />CEO Tenun Store<br /><br /><br /><br /><br />( ----------------- )</p>
</body>
</html>
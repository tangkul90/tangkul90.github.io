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
				    $tgl_awal=$_GET['tgl_awal'];
					$tgl_akhir=$_GET['tgl_akhir'];
				 
					$sql_t=mysqli_query($connect, "SELECT * FROM laporan l, pesanan p, motif m, customer c where l.id_pesanan=p.id_pesanan and p.kd_motif=m.kd_motif and p.id_customer=c.id_customer and l.tanggal between '$tgl_awal' and '$tgl_akhir'  ORDER BY l.id_laporan DESC") or die ("error");
         
					 ?><h2 align="center">TENUN STORE</h2>
                     <center>Alamat : Desa sukarare, Kec.Jonggat, kab.Lombok Tengah, (NTB) No hp : 081805772571</center>
                     <hr color="#000000" size="3" /><hr color="#000000" size="1" />
                     <h3 align="center">Laporan Penjualan Tanggal <?php echo $_GET['tgl_awal'];?> S/D Tanggal <?php echo $_GET['tgl_awal'];?></h3>
                      <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered">
        <tr>
                      <th style="width: 10px">#</th>
                      <th>Tanggal</th>
                      <th>Kode Pesanan</th>
                       <th>Customer</th>
                      <th>Nama Motif</th>
                       <th>Harga</th>
                        <th>Jumlah</th>
                       
                       <th>Total</th>
                                       </tr>
                    <?php
          $no=1;
          $jum=0;
          $total_belanja=0;
          while($data_t=mysqli_fetch_array($sql_t)){
            
          
          
          ?>
                               <tr>
                      <td><?php echo $no ; ?></td>
                      <td><?php echo $data_t['tanggal'] ; ?></td>
                      <td><?php echo $data_t['kode_pesanan'] ; ?></td>
                      <td><?php echo $data_t['nama'] ; ?></td>
                      <td><?php echo $data_t['nm_motif'] ; ?></td>
                      <td><?php echo number_format($data_t['harga']) ; ?></td>
                       <td><?php echo $data_t['jumlah_pesanan'] ; ?></td>
                        
                        <td><?php $total=($data_t['harga']*$data_t['jumlah_pesanan']);  echo number_format($total); ?></td>
                   
                      </tr>              
                   <?php $no++;
           $jum +=$data_t['jumlah_pesanan'];
           $total_belanja +=$total;
            }?>
                    <tr>
                      <td></td>
                      <th colspan="4">TOTAL</th>
                      <th>:</th>
                       <th><?php echo $jum ; ?> Item</th>
                        <td><b><?php echo number_format($total_belanja); ?></b></td>
                   
                    </tr>     
                  </table>
                  <br />
                  <p align="right">Lombok, <?php echo date("d-m-Y"); ?></p>
                  <p align="center">Mengetahui<br />CEO Tenun Store<br /><br /><br /><br /><br />( ----------------- )</p>
</body>
</html>
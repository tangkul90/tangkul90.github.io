<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Laporan Data Kartu Gudang</title>
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
          $nama=$_GET['nama_barang'];
          $tgl_awal=$_GET['tgl_awal'];
          $tgl_akhir=$_GET['tgl_akhir'];

         $sql_t=mysqli_query($connect, "SELECT * FROM  kain_masuk where kd_motif='$nama' and tgl_kain_masuk between '$tgl_awal' and '$tgl_akhir'") or die ("errorm");
				 
				 $sql_k=mysqli_query($connect, "SELECT * FROM pesanan p, laporan l, motif m where p.id_pesanan=l.id_pesanan and p.kd_motif=m.kd_motif and p.kd_motif='$nama' and l.tanggal between '$tgl_awal' and '$tgl_akhir'") or die ("errork");

         $hasil=mysqli_num_rows($sql_t);

					 ?><h2 align="center">TENUN STORE</h2>
                     <center>Alamat : Desa sukarare, Kec.Jonggat, kab.Lombok Tengah, (NTB) No hp : 081805772571</center>
                     <hr color="#000000" size="3" /><hr color="#000000" size="1" />
                     <h3 align="center">Laporan Kartu Gudang Tanggal <?php echo $_GET['tgl_awal'];?> S/D Tanggal <?php echo $_GET['tgl_awal'];?></h3>
                      <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered">
                   <tr>
                      <th style="width: 10px">#</th>
                      <th>Nama Motif</th>
                      <th>Barang Masuk</th>
                       <th>Barang Keluar</th>
                      <th>Saldo</th>        
                   </tr>

                    <?php
        
        $jumlah_k=0;
          while($data_k=mysqli_fetch_array($sql_k)){
            $jumlah_k+=$data_k['jumlah_pesanan'] ;
  }
            ?>
                    <?php
          
        $jumlah_m=0;
          while($data_t=mysqli_fetch_array($sql_t)){
            $jumlah_m+=$data_t['jmlh_kain_masuk'] ;
  }
            ?>
                    <tr>
                    <td><?php 
          $sql=mysqli_query($connect, "SELECT * FROM  motif where kd_motif='".$_GET['nama_barang']."' ORDER BY kd_motif desc");
                while($n=mysqli_fetch_array($sql)){

                      echo $n['nm_motif'] ;
}
                       ?></td>
                      <td><?php echo $jumlah_m ; ?></td>
                      <td><?php echo $jumlah_k ; ?></td>
                      <td><?php $saldo=$jumlah_m-$jumlah_k; echo $saldo ; ?></td>
                    </tr>          
                 
                    
                  </table>
                  <br />
                  <p align="right">Lombok, <?php echo date("d-m-Y"); ?></p>
                  <p align="center">Mengetahui<br />CEO Tenun Store<br /><br /><br /><br /><br />( ----------------- )</p>
</body>
</html>
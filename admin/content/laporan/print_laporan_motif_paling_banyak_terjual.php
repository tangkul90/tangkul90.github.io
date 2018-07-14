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
         
         $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain order by dijual desc
          ") or die ("error");
         
           ?><h2 align="center">TENUN STORE</h2>
                    <center>Alamat : Desa sukarare, Kec.Jonggat, kab.Lombok Tengah, (NTB) No hp : 081805772571</center>
                    <hr color="#000000" size="3" /><hr color="#000000" size="1" />
                    <h3 align="center">Laporan Motif Paling Banyak Terjual <?php echo $_GET['tgl_awal'];?> S/D Tanggal <?php echo $_GET['tgl_awal'];?></h3>
                      <table width="100%" border="1" cellpadding="4" cellspacing="0" class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                       <th>Nama Motif</th>
                       <th>Jenis Kain</th>
                       <th>Di Jual</th>
                    </tr>
                    <?php
          $no=1;
          
          while($data_t=mysqli_fetch_array($sql)){
  
            ?>
                    <tr>
                      <td><?php echo $no ; ?></td>
                      <td><?php echo $data_t['nm_motif'] ; ?></td>
                      <td><?php echo $data_t['nm_jenis_kain'] ; ?></td>
                      <td><?php echo $data_t['dijual'] ; ?></td>
                    </tr>              
                   <?php $no++;
          
            }?>    
                  
                  </table>
                  <br />
                  <p align="right">Lombok, <?php echo date("d-m-Y"); ?></p>
                  <p align="center">Mengetahui<br />CEO Tenun Store<br /><br /><br /><br /><br />( ----------------- )</p>
</body>
</html>
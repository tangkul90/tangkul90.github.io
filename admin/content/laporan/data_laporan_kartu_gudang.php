<section class="content-header">
          <h1>
            Laporan
            <small>Kain Masuk</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         
            <li class="active">Laporan Kartu Gudang</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Kartu Gudang</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body">
            
            
             <div class="box-header with-border">
                  
                </div><!-- /.box-header -->
                <form method="post" action="">
                <div class="row">
                  <div class="col-md-2">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Barang :</label>
<?php 

?>
               <select name="nama_barang" class="form-control">
                <?php
                $sql_m=mysqli_query($connect, "SELECT * FROM  motif ORDER BY kd_motif desc");
                while($d=mysqli_fetch_array($sql_m)){
                  ?>
<option value="<?php echo $d['kd_motif'];?>"><?php echo $d['nm_motif'];?></option>
                  <?php
                }?>
               </select>

                </div></div>
                <div class="col-md-2">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Awal :</label>
                <input type="date" name="tgl_awal" class="form-control" />
                </div></div>
                <div class="col-md-2">
                      <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Akhir :</label>
                <input type="date" name="tgl_akhir" class="form-control" />
                </div></div>
                <div class="col-md-8">
                      <div class="form-group">
                      <br />
                 <button type="submit" name="cari" class="btn btn-primary"><i class="fa fa-search"></i >  Search</button> 
                 <?php  if(isset($_POST['cari'])){  ?>
 <a href="content/laporan/print_laporan_data_kartu_gudang.php?tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>&nama_barang=<?php echo $_POST['nama_barang']; ?>" target="_blank"><button type="button" name="cari" class="btn btn-default"><i class="fa fa-print"></i> Print</button></a>
                 <?php }?>
                 </div></div></div>
                 </form>
                 <?php 
				 if(isset($_POST['cari'])){
          $nama=$_POST['nama_barang'];
				  $tgl_awal=$_POST['tgl_awal'];
					$tgl_akhir=$_POST['tgl_akhir'];
				 
					$sql_t=mysqli_query($connect, "SELECT * FROM  kain_masuk where kd_motif='$nama' and tgl_kain_masuk between '$tgl_awal' and '$tgl_akhir'") or die ("errorm");

          $sql_k=mysqli_query($connect, "SELECT * FROM pesanan p, laporan l, motif m where p.id_pesanan=l.id_pesanan and p.kd_motif=m.kd_motif and p.kd_motif='$nama' and l.tanggal between '$tgl_awal' and '$tgl_akhir'") or die ("errork");

					$hasil=mysqli_num_rows($sql_t);

					if($hasil==0){
						echo'<div class="callout callout-danger">
            <h4>Keterangan!</h4>
            <p>Hasil Pencarian Kosong.!!!</p>
          </div>';
					}else{
						echo "<h4>Kartu Gudang Dari Tanggal $tgl_awal / $tgl_akhir</h4>";
						}
					 ?>
                  <table class="table table-bordered">
                    <tr>
                     
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
          $sql=mysqli_query($connect, "SELECT * FROM  motif where kd_motif='".$_POST['nama_barang']."' ORDER BY kd_motif desc");
                while($n=mysqli_fetch_array($sql)){

                      echo $n['nm_motif'] ;
}
                       ?></td>
                      <td><?php echo $jumlah_m ; ?></td>
                      <td><?php echo $jumlah_k ; ?></td>
                      <td><?php $saldo=$jumlah_m-$jumlah_k; echo $saldo ; ?></td>
                    </tr>              
                 
                  </table>
              
            <?php }else{echo ' <div class="callout callout-danger">
            <h4>Keterangan!</h4>
            <p>Silahkan Pilih Tanggal di atas untuk melakukan pencarian data laporan kain masuk.!!!</p>
          </div>';}?>
            </div></div></section>
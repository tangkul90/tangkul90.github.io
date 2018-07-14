<section class="content-header">
          <h1>
            Laporan
            <small>Penjualan Perperiode</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         
            <li class="active">Laporan Penjualan Perperiode</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Laporan Penjualan Perperiode</h3>
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
                 <button type="submit" name="cari" class="btn btn-primary"><i class="fa fa-search"></i > Search</button> 
                 <?php  if(isset($_POST['cari'])){  ?>
 <a href="content/laporan/print_laporan_penjualan.php?tgl_awal=<?php echo $_POST['tgl_awal']; ?>&tgl_akhir=<?php echo $_POST['tgl_akhir']; ?>" target="_blank"><button type="button" name="cari" class="btn btn-default"><i class="fa fa-print"></i> Print</button></a>
                 <?php }?>
                 </div></div></div>
                 </form>
                 <?php 
				 if(isset($_POST['cari'])){
				    $tgl_awal=$_POST['tgl_awal'];
					$tgl_akhir=$_POST['tgl_akhir'];
				 
					$sql_t=mysqli_query($connect, "SELECT * FROM laporan l, pesanan p, motif m, customer c where l.id_pesanan=p.id_pesanan and p.kd_motif=m.kd_motif and p.id_customer=c.id_customer and l.tanggal between '$tgl_awal' and '$tgl_akhir'  ORDER BY l.id_laporan DESC") or die ("error");
					$hasil=mysqli_num_rows($sql_t);
					if($hasil==0){
						echo'<div class="callout callout-danger">
            <h4>Keterangan!</h4>
            <p>Hasil Pencarian Kosong.!!!</p>
          </div>';
					}else{
						echo "<h4>Banyak Data : <b>".$hasil."</b> || Dari Tanggal $tgl_awal / $tgl_akhir</h4>";
						}
					 ?>
                  <table class="table table-bordered">
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
              
            <?php }else{echo ' <div class="callout callout-danger">
            <h4>Keterangan!</h4>
            <p>Silahkan Pilih Tanggal di atas untuk melakukan pencarian data laporan Penjualan.!!!</p>
          </div>';}?>
            </div></div></section>
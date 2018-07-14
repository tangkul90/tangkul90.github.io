 <section class="content-header">
          <h1>
            Dashboard
            <small>Halaman Home</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              
          <div class="callout callout-info">
            <h4>Hay, <b><?php echo $data_us['nama_lengkap']; ?></b></h4>
            <p>Selamat datang di halaman <b>Admin</b> Tenun Shop.</p>
            
          </div>
<!--------------------------------------------------------------------------------------------------------------- -->

 
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-aqua">
                <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Penjualan</span>
                  <span class="info-box-number"><?php echo $jum_penjualan;?> Item</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    <a href="index.php?mod=transaksi&pg=data_transaksi" style="color: #fff;"> More Info</a>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-green">
                <span class="info-box-icon"><i class="fa fa-cart-arrow-down"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Barang Masuk</span>
                  <span class="info-box-number"><?php echo $jum_stock;?> Item</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                    <a href="index.php?mod=stock&pg=data_stock" style="color: #fff;"> More Info</a>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-yellow">
                <span class="info-box-icon"><i class="fa  fa-flag-checkered"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Data Motif</span>
                  <span class="info-box-number"><?php echo $jum_motif;?> Item</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                  <a href="index.php?mod=motif&pg=data_motif" style="color: #fff;"> More Info</a>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box bg-red">
                <span class="info-box-icon"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Customer</span>
                  <span class="info-box-number"><?php echo $jum_customer;?> User</span>
                  <div class="progress">
                    <div class="progress-bar" style="width: 100%"></div>
                  </div>
                  <span class="progress-description">
                   <a href="index.php?mod=customer&pg=data_customer" style="color: #fff;"> More Info</a>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->



<div class="row">
<div class="col-md-6">
              <!-- TABLE: LATEST ORDERS -->
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Penjualan Motif</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Motif</th>
                          <th>Jenis Kain</th>
                          <th>Di Jual</th>
                        </tr>
                      </thead>
                      <tbody>
          <?php
          $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain order by dijual desc
          ") or die ("error");
          $no=1;
          while($data=mysqli_fetch_array($sql)){
          
           ?>
                        <tr>
                        <td><?php echo $no; ?></td>
                          <td><a href=""><?php echo $data['nm_motif']; ?></a></td>
                          <td><?php echo $data['nm_jenis_kain'] ?></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $data['dijual']; ?></div></td>
                        </tr>
                       <?php $no++; }?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                </div><!-- /.box-footer --></div>
</div>
<div class="col-md-6">    
         <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Stock Motif</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="table-responsive">
                    <table class="table no-margin">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Motif</th>
                          <th>Jenis Kain</th>
                          <th>Jumlah Stock</th>
                           <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
          <?php
          $sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain order by kd_motif desc
          ") or die ("error");
          $no=1;
          while($data=mysqli_fetch_array($sql)){
          
           ?>
                        <tr>
                        <td><?php echo $no; ?></td>
                          <td><a href=""><?php echo $data['nm_motif']; ?></a></td>
                          <td><?php echo $data['nm_jenis_kain'] ?></td>
                          <td><div class="sparkbar" data-color="#00a65a" data-height="20"><?php echo $data['stock'] ?></div></td>
                           <td><span class="label label-<?php if($data['stock']<=5){echo 'danger';}elseif ($data['stock']>=5) {echo 'success';}?>"><?php

if($data['stock']<=5){echo "Stock Kurang";}elseif ($data['stock']>=5) {echo "Stock Masih";}
                            ?></span></td>
                        </tr>
                       <?php $no++; }?>
                      </tbody>
                    </table>
                  </div><!-- /.table-responsive -->
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
                  <a href="index.php?mod=stock&pg=data_stock" class="btn btn-sm btn-info btn-flat pull-left">Selengkapnya</a>
                  
                </div><!-- /.box-footer -->
                </div>
</div></div>
          
          </section><!-- /.content -->
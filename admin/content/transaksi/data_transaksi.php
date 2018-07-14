 <section class="content-header">
          <h1>
            Data
            <small>Penjualan</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Penjualan</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
                 
               </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Order</th>
                        <th>Tanggal</th>
                        <th>Customer</th>
                        <th>Jumlah</th>
                        <th>Status</th>
                        <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM detail_pesanan o, customer c where o.id_customer=c.id_customer order by kd_detail_pesanan desc
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
$sql_k=mysqli_query($connect, "SELECT * FROM pesanan where kode_pesanan=".$data['kode_pesanan']." order by id_pesanan
					") or die ("error");
					$jumlah=0;
					while($d=mysqli_fetch_array($sql_k)){
						$jumlah+=$d['jumlah_pesanan'];
					}
					
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['kode_pesanan'] ; ?></td>
                        <td><?php echo $data['tanggal_pesan'] ; ?></td>
                        <td><?php echo $data['nama'] ;?></td>                        
                        <td><?php echo $jumlah ;?> Item</td>
                        <td>
                        <span class="label <?php if($data['status_order']=='Menunggu'){echo "label-warning";}elseif($data['status_order']=='dibayar'){echo "label-success";}elseif($data['status_order']=='Ditolak'){echo "label-danger";}elseif($data['status_order']=='Lunas'){echo "label-primary";}?>"><?php echo $data['status_order'] ;?></span></td>
                        <td align="center"><div style="width:150px;">
<a href="index.php?mod=transaksi&pg=detail_transaksi&id=<?php echo $data['kode_pesanan']; ?>"><button title="Detail" type="button" class="btn btn-success"><i class="fa fa-search fa-fw"></i></button></a></div></td>
                      </tr>              
                   
               <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                     </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                 </section><!-- /.content -->
                  <!-- DataTables -->
   
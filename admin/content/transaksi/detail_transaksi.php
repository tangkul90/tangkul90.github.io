<section class="content-header">
          <h1>
           Detail
            <small>Order</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detail Order</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
       
            <div class="box box-primary">
                <div class="box-header">
                					<?php
                                    $sql=mysqli_query($connect, "SELECT * FROM detail_pesanan o, customer c where o.id_customer=c.id_customer	and kode_pesanan='$_GET[id]'") or die ("error Order");
					
					$data_or=mysqli_fetch_array($sql);
					
					?>
            <?php if(($data_or['status_order']=='Ditolak') || ($data_or['status_order']=='Diterima') || ($data_or['status_order']=='Menunggu')){?>
<a href="content/transaksi/print_transaksi.php?kode_pesanan=<?php echo $data_or['kode_pesanan']; ?>" target="_blank"><button type="button" class="btn btn-primary"><i class="fa fa-print fa-check-square"></i> Print Data Transaksi</button></a> 
            <?php }else{ ?>
<a href="content/transaksi/konfirmasi.php?kode_pesanan=<?php echo $data_or['kode_pesanan']; ?>&tanggal=<?php echo $data_or['tanggal_pesan']; ?>&status=Konfirmasi"><button type="button" class="btn btn-primary"><i class="fa fa-pencil fa-check-square"></i> Konfirmasi</button></a> 
<a href="content/transaksi/konfirmasi.php?kode_pesanan=<?php echo $data_or['kode_pesanan']; ?>&status=Ditolak" onclick="return confirm('Anda Yakin Akan Menolak Order Customer dengan Kode Order : <?php echo $data_or['kode_pesanan'] ; ?> ?')"><button type="button" class="btn btn-danger"><i class="fa fa-pencil fa-trash-o"></i> Tolak</button></a>
<?php }?>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                <div class="col-md-6">
                <h3><table width="100%" border="0" cellpadding="5" cellspacing="0" >
<tr>
<td>Kode Order</td>
<td>: <?php echo $data_or['kode_pesanan']; ?></td>
</tr>
<tr>
<td>Tanggal Order</td>
<td>: <?php echo $data_or['tanggal_pesan']; ?></td>
</tr>
<tr>
<td>Nama</td>
<td>: <?php echo $data_or['nama']; ?></td>
</tr>
<tr>
<td>Email</td>
<td>: <?php echo $data_or['email']; ?></td>
</tr>
<tr>
<td>No Telephone</td>
<td>: <?php echo $data_or['no_telpon']; ?></td>
</tr>
<tr>
<td>Alamat Pengirim</td>
<td>: <?php echo $data_or['alamat']; ?></td>
</tr>
<tr>
<td>Status Order</td>
<td>: <?php echo $data_or['status_order']; ?></td>
</tr>
</table></h3>
</div>  <div class="col-md-6">
<label>Bukti Transfer :</label><br />
<?php if(empty($data_or['bukti_transfer'])){?>
<div class="callout callout-danger">
            <h4>Bukti Transfer Masih Kosong </h4>
            
          </div>
<?php }else{?>
<img src="../content/customer/<?php echo $data_or['bukti_transfer']; ?>" class="img-thumbnail" width="200" />
<?php }?>
</div></div>
<hr size="3" color="#000000" />
                <table class="table">
                <tr>
                <th>No</th>
                 <th>Gambar</th>
                  <th>Nama Motif</th>
                  <th>Jenis</th>
                   <th>Harga</th>
                   <th>Jumlah</th>
                   <th>Total Harga</th>
                </tr>
                <?php
                                    $sql_p=mysqli_query($connect, "SELECT * FROM pesanan p, motif m, jenis_kain j where p.kd_motif=m.kd_motif and m.kd_jenis_kain=j.kd_jenis_kain and p.kode_pesanan='$data_or[kode_pesanan]'") or die ("error Order");
					$no=1;
					$subtotal=0;
					while($data=mysqli_fetch_array($sql_p)){
						$subtotal +=$data['harga']*$data['jumlah_pesanan'];
					?>
                <tr>
                <td><?php echo $no; ?></td>
                <td><img src="content/motif/<?php echo $data['gambar']; ?>" class="img-thumbnail" width="100" /></td>
                <td><?php echo $data['nm_motif']; ?></td>
                <td><?php echo $data['nm_jenis_kain']; ?></td>
                <td><?php echo number_format($data['harga']); ?></td>
                <td><?php echo $data['jumlah_pesanan']; ?></td>
                <td><?php $total=$data['harga']*$data['jumlah_pesanan']; echo number_format($total); ?></td>
                </tr>
                <?php $no++; }?>                
                </table>
                
                </div>
                
                <div class="box box-success">
                <div class="box-header">
                <h2><b>Total Belanja : Rp <?php echo number_format($subtotal); ?></b></h2>
                <div class='box-footer box-comments'>
               
               
                </div><!-- /.box-footer -->
                <div class="box-footer">
                 

                </div><!-- /.box-footer -->
               
                
                </div>
                
                </div>
                </section>
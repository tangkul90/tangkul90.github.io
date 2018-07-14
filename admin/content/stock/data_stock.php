
 <section class="content-header">
          <h1>
            Data
            <small>Stock Barang</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Stock</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
            
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_stock"><i class="fa fa-plus fa-fw"></i> Tambah Stock</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NAMA Motif</th>
                        <th>NAMA Jenis Kain</th>
                        <th>TANGGAL</th>
                        <th>JUMLAH</th>
                        <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM kain_masuk k, motif m, jenis_kain j where k.kd_motif=m.kd_motif and m.kd_jenis_kain=j.kd_jenis_kain ORDER BY k.kd_kain_masuk DESC
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['nm_motif'] ; ?></td>
                        <td><?php echo $data['nm_jenis_kain'] ; ?></td>
                        <td><?php echo $data['tgl_kain_masuk'] ; ?></td>
                        <td><?php echo $data['jmlh_kain_masuk'] ; ?></td>
                        
                        <td align="center"><div style="width:100px;"> 
                       
<button title="Edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_km<?php echo $data['kd_kain_masuk']; ?>"><i class="fa fa-pencil fa-fw"></i></button></a>
<a href="content/stock/hapus.php?id=<?php echo $data['kd_kain_masuk']; ?>&jumlah=<?php echo $data['jmlh_kain_masuk'] ; ?>&motif=<?php echo $data['kd_motif'] ; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Stock Barang : <?php echo $data['nm_motif'] ; ?> ?')"><button title="Hapus" type="butt<?php echo $data['kd_motif'] ; ?>on" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button></a>
</div></td>
                      </tr>              
                  <!-- edit password-->         
  <div id="edit_km<?php echo $data['kd_kain_masuk']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/stock/sim_edit.php">
 <input type="hidden" name="id" value="<?php echo $data['kd_kain_masuk'] ; ?>">
 <input type="hidden" name="motif" value="<?php echo $data['kd_motif'] ; ?>">
 <input type="hidden" name="jumlah_awal" value="<?php echo $data['jmlh_kain_masuk'] ; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Stock</h4>
      </div>
      <div class="modal-body">
        <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Motif : <?php echo $data['nm_motif'] ; ?></label>
                      </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal : <?php echo $data['tgl_kain_masuk'] ; ?></label>
                      </div>
                      <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Stock : <?php echo $data['jmlh_kain_masuk'] ; ?></label>
                      </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Edit Stock :</label>
                      <input type="number" name="jumlah_akhir" style="width: 100px;" class="form-control" id="" required>
                    </div>
                                         
                     </div><!-- /.box-body --></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div></form>

  </div>
</div>
  <!-- akhir edit password--> 
     
               <?php $no++; } ?>
                    </tbody>
                    <tfoot>
                     </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                 </section><!-- /.content -->
<?php include"content/stock/form_stock.php"; ?>
 <!-- DataTables -->
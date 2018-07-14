
 <section class="content-header">
          <h1>
            Data
            <small>Jenis Kain</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Jenis Kain</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
            
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_jenis"><i class="fa fa-plus fa-fw"></i> Tambah Jenis Kain</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NAMA Jenis Kain</th>
                        <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM jenis_kain ORDER BY kd_jenis_kain DESC
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['nm_jenis_kain'] ; ?></td>
                        <td align="center"><div style="width:100px;"> 
                       
<button title="Edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_jenis<?php echo $data['kd_jenis_kain']; ?>"><i class="fa fa-pencil fa-fw"></i></button></a>
<a href="content/jenis_kain/hapus.php?id=<?php echo $data['kd_jenis_kain']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus data Jenis Kain : <?php echo $data['nm_jenis_kain'] ; ?> ?')"><button title="Hapus" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button></a>
</div></td>
                      </tr>              
                  <!-- edit password-->         
  <div id="edit_jenis<?php echo $data['kd_jenis_kain']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/jenis_kain/sim_edit.php">
 <input type="hidden" name="id" value="<?php echo $data['kd_jenis_kain'] ; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Kategori</h4>
      </div>
      <div class="modal-body">
        <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Kategori :</label>
                      <input type="text" name="nama" value="<?php echo $data['nm_jenis_kain'] ; ?>" class="form-control" id="">
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
<?php include"content/jenis_kain/form_jenis.php"; ?>
 <!-- DataTables -->
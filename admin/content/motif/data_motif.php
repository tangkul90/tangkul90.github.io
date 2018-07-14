
 <section class="content-header">
          <h1>
            Data
            <small>Motif</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Motif</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box">
                <div class="box-header">
            
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambah_motif"><i class="fa fa-plus fa-fw"></i> Tambah Motif</button>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>NAMA</th>
                          <th>JENIS</th>
                            <th>HARGA</th>
                              <th>STOCK</th>
                                <th>GAMBAR</th>
                        <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM motif m, jenis_kain j where m.kd_jenis_kain=j.kd_jenis_kain ORDER BY kd_motif DESC
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['nm_motif'] ; ?></td>
                         <td><?php echo $data['nm_jenis_kain'] ; ?></td>
                          <td><?php echo number_format($data['harga']) ; ?></td>
                           <td><?php echo $data['stock'] ; ?></td>
                            <td><img src="content/motif/<?php echo $data['gambar'] ; ?>" style="width: 100px;"></td>
                        <td align="center"><div style="width:100px;"> 
                       
<button title="Edit" type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_motif<?php echo $data['kd_motif']; ?>"><i class="fa fa-pencil fa-fw"></i></button></a>
<a href="content/motif/hapus.php?id=<?php echo $data['kd_motif']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus data Motif : <?php echo $data['nm_motif'] ; ?> ?')"><button title="Hapus" type="button" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button></a>
</div></td>
                      </tr>              
                  <!-- edit password-->         
  <div id="edit_motif<?php echo $data['kd_motif']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/motif/sim_edit.php" enctype="multipart/form-data">
 <input type="hidden" name="id_motif" value="<?php echo $data['kd_motif'] ; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Motif</h4>
      </div>
      <div class="modal-body">
       <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Motif :</label>
                      <input type="text" name="nama" value="<?php echo $data['nm_motif'] ; ?>" class="form-control" id="">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kain :</label>
                      <select class="form-control" name="jenis_kain">
                     <?php
          $sqlj=mysqli_query($connect, "SELECT * FROM jenis_kain  ORDER BY kd_jenis_kain DESC
          ") or die ("error");
         
          while($dataj=mysqli_fetch_array($sqlj)){
           ?>
                        <option <?php if($data['kd_jenis_kain']==$dataj['kd_jenis_kain']){ echo'selected="selected"';} ?> value="<?php echo $dataj['kd_jenis_kain'];?>"><?php echo $dataj['nm_jenis_kain'];?></option>
                        <?php }?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Harga :</label>
                      <input type="number" name="harga" value="<?php echo $data['harga'] ; ?>" class="form-control" id="">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Gambar Baru :</label>
                      <div class="row">
                      <div class="col-md-6">
                      <input class="form-control" type="file" id="fileUpload" name="gambar" multiple="multiple">
                      </div>
                      <div class="col-md-6">
                       <p class="help-block"  id="image-holder"></p>
                       </div></div>
                    </div>
                     <div class="form-group">
                     
                     <label for="exampleInputEmail1">Gambar Lama :</label><br>
                     <img src="content/motif/<?php echo $data['gambar'] ; ?>" style="width: 100px;">
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
<?php include"content/motif/form_motif.php"; ?>
 <!-- DataTables -->
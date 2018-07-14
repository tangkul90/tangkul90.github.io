 <!-- edit password-->         
  <div id="tambah_stock" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/stock/sim_upload.php">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Tambah Stock</h4>
      </div>
      <div class="modal-body">
        <p>
         <div class="form-group">
                      <label for="exampleInputEmail1">Pilih Motif :</label>
                      <select class="form-control" name="motif">
                     <?php
          $sqlj=mysqli_query($connect, "SELECT * FROM motif  ORDER BY kd_jenis_kain DESC
          ") or die ("error");
         
          while($dataj=mysqli_fetch_array($sqlj)){
           ?>
                        <option value="<?php echo $dataj['kd_motif'];?>"><?php echo $dataj['nm_motif'];?> (<?php echo $dataj['stock'];?>)</option>
                        <?php }?>
                      </select>
                    </div>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Jumlah Stock :</label>
                      <input type="number" name="jumlah" class="form-control" id="" style="width: 80px;">
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





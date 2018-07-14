<style type="text/css">.thumb-image{float:left;width:100px;position:relative;padding:; border:3px #ccc solid;}</style> <!-- edit password-->         
  <div id="tambah_motif" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/motif/sim_upload.php" enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Upload Motif</h4>
      </div>
      <div class="modal-body">
        <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Motif :</label>
                      <input type="text" name="nama" class="form-control" id="">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Jenis Kain :</label>
                      <select class="form-control" name="jenis_kain">
                     <?php
          $sqlj=mysqli_query($connect, "SELECT * FROM jenis_kain  ORDER BY kd_jenis_kain DESC
          ") or die ("error");
         
          while($dataj=mysqli_fetch_array($sqlj)){
           ?>
                        <option value="<?php echo $dataj['kd_jenis_kain'];?>"><?php echo $dataj['nm_jenis_kain'];?></option>
                        <?php }?>
                      </select>
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Harga :</label>
                      <input type="number" name="harga" class="form-control" id="">
                    </div>
                     <div class="form-group">
                      <label for="exampleInputEmail1">Gambar :</label>
                      <input class="form-control" type="file" id="fileUpload" name="gambar" required multiple="multiple"><br>
                       <p class="help-block"  id="image-holder"></p><br>
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




<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
<script>
$(document).ready(function() {
        $("#fileUpload").on('change', function() {
          //Get count of selected files
          var countFiles = $(this)[0].files.length;
          var imgPath = $(this)[0].value;
          var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();
          var image_holder = $("#image-holder");
          image_holder.empty();
          if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
            if (typeof(FileReader) != "undefined") {
              //loop for each file selected for uploaded.
              for (var i = 0; i < countFiles; i++) 
              {
                var reader = new FileReader();
                reader.onload = function(e) {
                  $("<img />", {
                    "src": e.target.result,
                    "class": "thumb-image"
                  }).appendTo(image_holder);
                }
                image_holder.show();
                reader.readAsDataURL($(this)[0].files[i]);
              }
            } else {
              alert("This browser does not support FileReader.");
            }
          } else {
            alert("Silahkan Pilih File Gambar saja .gip, .png, .jpg, dan . jpeg");
          }
        });
      });
</script>
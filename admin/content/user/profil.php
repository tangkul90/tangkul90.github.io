 <section class="content-header">
          <h1>
            User
            <small>Profil</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">user</a></li>
            <li class="active">profil</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
              <div class="box box-default">
                <div class="box-body">
                  <h3 class="box-title">Profil Anda</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                
                  <table width="100%" class="table table-bordered">
                    <tr>
                      <td width="23%"><b>Nama Lengkap</b></td>
                      <td width="77%">: <?php echo $data_us['nama_lengkap']; ?></td>
                      </tr>
                    <tr>
                      <td><b>Username</b></td>
                      <td>: <?php echo $data_us['username']; ?></td>
                      </tr>
                       
                      </table>
                  <br>
               <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit_profil">Edit Profil</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#edit_password">Ganti password</button>
                </div><!-- /.box-body -->
          </div>
                 </section><!-- /.content -->
        
        <!-- edit Profil-->         
  <div id="edit_profil" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
    <form method="post" action="content/user/edit_profil.php" enctype="multipart/form-data">
 <input type="hidden" name="id" value="<?php echo $data_us['username']; ?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Profil</h4>
      </div>
      <div class="modal-body">
        <p>
                  <div class="box-body">
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nama Lengkap</label>
                      <input type="text" required class="form-control" value="<?php echo $data_us['nama_lengkap']; ?>" name="nama">
                    </div>
                    
                    
                     </div><!-- /.box-body --></p>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div></form>

  </div>
</div>
  <!-- akhir edit Profil--> 
  
    <!-- edit password-->         
  <div id="edit_password" class="modal fade" role="dialog">
  <div class="modal-dialog">
<form method="post" action="content/user/ganti_password.php">
 <input type="hidden" name="username" value="<?php echo $data_us['username']; ?>">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ganti Password</h4>
      </div>
      <div class="modal-body">
        <p>
                  <div class="box-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Username</label>
                      <input type="text" disabled name="username" value="<?php echo $data_us['username']; ?>" class="form-control" id="exampleInputEmail1">
                    </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">Password</label>
                      <input type="password" required name="password" class="form-control" >
                    </div>
                       <div class="form-group">
                      <label for="exampleInputEmail1">New Password</label>
                      <input type="password" required name="password_b" class="form-control">
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

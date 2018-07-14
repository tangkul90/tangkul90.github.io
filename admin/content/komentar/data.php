
 <section class="content-header">
          <h1>
            Data
            <small>data Komentar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Komentar</li>
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
                        <th>NO</th>
                        <th>EMAIL</th>
                        <th>NAMA</th>
                        <th>TANGGAL</th>
                          <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM komentar ORDER BY id_komen DESC
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['email'] ; ?></td>
                        <td><?php echo $data['nama'] ; ?></td>
                        <td><?php echo date("d M Y", strtotime($data['tanggal'] )); ?></td>
                       
                        <td align="center"><div style="width:100px;"> 
                       <a href="index.php?mod=komentar&pg=detail&id=<?php echo $data['id_komen']; ?>"><button title="Detail" class="btn btn-success"><i class="fa fa-search fa-fw"></i></button></a>
<a href="content/komentar/hapus.php?id=<?php echo $data['id_komen']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Komentar : <?php echo $data['nama'] ; ?> ?')"><button title="Hapus" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button></a>
</div></td>
                      </tr>              
                  
     
               <?php $no++; } ?>
               
                    </tbody>
                    <tfoot>
                     </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
                 </section><!-- /.content -->

 <section class="content-header">
          <h1>
            Data
            <small>data customer</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Data Customer</li>
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
                        <th>ID</th>
                        <th>EMAIL</th>
                        <th>NAMA</th>
                        <th>NO TELPON</th>
                        <th>ALAMAT</th>
                          <th>OPTION</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
					$sql=mysqli_query($connect, "SELECT * FROM customer ORDER BY id_customer;
					") or die ("error");
					$no=1;
					while($data=mysqli_fetch_array($sql)){
					 ?>
                      <tr>
                        <td><?php echo $no ; ?></td>
                        <td><?php echo $data['email'] ; ?></td>
                        <td><?php echo $data['nama'] ; ?></td>
                        <td><?php echo $data['no_telpon'] ; ?></td>
                        <td><?php echo $data['alamat'] ; ?></td>
                        
                        <td align="center"><div style="width:100px;"> 
                       
<a href="content/customer/hapus.php?id=<?php echo $data['id_customer']; ?>" onclick="return confirm('Anda Yakin Akan Menghapus Stock Barang : <?php echo $data['nm_motif'] ; ?> ?')"><button title="Hapus" type="butt<?php echo $data['kd_motif'] ; ?>on" class="btn btn-danger"><i class="fa fa-trash-o fa-fw"></i></button></a>
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
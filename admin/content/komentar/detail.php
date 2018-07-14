<section class="content-header">
          <h1>
           Detail
            <small>Komentar</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Detail Komentar</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
       
            <div class="box box-primary">
                <div class="box-header">
                					<?php
                                    $sql=mysqli_query($connect, "SELECT * FROM komentar where id_komen='$_GET[id]'") or die ("error Order");
					
					$data_or=mysqli_fetch_array($sql);
					
					?>
         <h3> Detail Komentar</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                <table width="100%" border="0" cellpadding="5" cellspacing="0" >
<tr>
<td width="100px">Nama </td>
<td>: <?php echo $data_or['nama']; ?></td>
</tr>
<tr>
<td>Email </td>
<td>: <?php echo $data_or['email']; ?></td>
</tr>
<tr>
<td>Tanggal </td>
<td>: <?php echo date("d M Y", strtotime($data_or['tanggal'])); ?></td>
</tr>
<tr>
<td>Komentar </td>
<td>: <?php echo $data_or['komentar']; ?></td>
</tr>
</table>
</div>
                 
                </div><!-- /.box-footer -->
               
                
                </div>
                
                </div>
                </section>
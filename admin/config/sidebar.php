        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="content/user/foto/images-4.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php echo $data_us['nama_lengkap'];?></p>
              <a href="#"><?php echo $data_us['username'];?></a>
            </div>
          </div>
          <!-- search form -->
          <br />
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
                  
            <li class="header">MAIN NAVIGATION</li>
            <li class="<?php if(empty($_GET['mod'])){ echo "active";} ?>">
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a> </li>
                <li>
              <a href="index.php?mod=transaksi&pg=data_transaksi">
                <i class="fa fa-cart-arrow-down"></i> <span>Data Pemesanan</span>
              </a>
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-cube"></i>
                <span>Barang</span>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?mod=motif&pg=data_motif"><i class="fa fa-circle-o"></i> Data Motif</a></li>
                <li><a href="index.php?mod=stock&pg=data_stock"><i class="fa fa-circle-o"></i> Data Stock</a></li>
                <li><a href="index.php?mod=jenis_kain&pg=data_jenis"><i class="fa fa-circle-o"></i> Data Jenis Kain</a></li>
                
              </ul>
            </li>                 
              
              <li>
              <a href="index.php?mod=pengiriman&pg=data_pengiriman">
                <i class="fa  fa-send"></i> <span>Data Pengiriman</span>
              </a>
            </li>
             <li>
              <a href="index.php?mod=Customer&pg=data_customer">
                <i class="fa fa-users"></i> <span>Data Customer</span>
              </a>
            </li>
            <li>
              <a href="index.php?mod=komentar&pg=data">
                <i class="fa fa-comments"></i> <span>Pesan dan Saran</span>
              </a>
            </li>
<li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Laporan</span>
                
              </a>
              <ul class="treeview-menu">
                <li><a href="index.php?mod=laporan&pg=data_laporan_penjualan"><i class="fa fa-circle-o"></i> Penjualan Perperiode</a></li>
                <li><a href="index.php?mod=laporan&pg=data_laporan_kain_masuk"><i class="fa fa-circle-o"></i> Kain Masuk</a></li>
                <li><a href="index.php?mod=laporan&pg=data_laporan_kartu_gudang"><i class="fa fa-circle-o"></i> Kartu Gudang</a></li>
                <li><a href="index.php?mod=laporan&pg=data_laporan_motif_paling_banyak_terjual"><i class="fa fa-circle-o"></i> Motif Paling Banyak Terjual</a></li>
              </ul>
            </li>
                
               </ul>
        </section>
        <!-- /.sidebar -->
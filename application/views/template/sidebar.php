<ul class="nav navbar-nav side-nav">
            <li><a href="<?= site_url("dashboard"); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
			<li><a href="<?= site_url("siswa"); ?>"><i class="fa fa-table"></i> Siswa</a></li>
            <li><a href="<?= site_url("kelas"); ?>"><i class="fa fa-home"></i> Kelas</a></li>
			<li><a href="<?= site_url("mapel"); ?>"><i class="fa fa-desktop"></i> Mata Pelajaran</a></li>
            <li><a href="<?= site_url("nilai"); ?>"><i class="fa fa-font"></i> Nilai</a></li>
            <li><a href="<?= site_url("gambar"); ?>"><i class="fa fa-edit"></i> Foto</a></li>
             <li><a href="<?= site_url("diagram"); ?>"><i class="fa fa-bar-chart-o"></i> Diagram</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> User Menu <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#"><i class="fa fa-key"></i> Ganti Password</a></li>
                <li><a href="<?= site_url('login/logout');?>" onclick="return confirm('yakin mau keluar?');"><i class="fa fa-sign-out"></i> Logout</a></li>
              </ul>
</li>
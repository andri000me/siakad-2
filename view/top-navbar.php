<!--header start-->
<header class="header fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle hr-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="fa fa-bars"></span>
        </button>

        <!--logo start-->
        <!--logo start-->
        <div class="brand ">
            <a href="?page=home" class="logo">
                <img src="assets/images/logo3.png" alt="">
            </a>
        </div>
        <!--logo end-->
        <!--logo end-->
        <div class="horizontal-menu navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                <li class="<?php echo($_GET['page']=='home')?'active':'' ?>">
                    <a href="?page=home">
                        <i class="fa fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-briefcase"></i>
                        <span>Master Data</span> <b class=" fa fa-angle-down"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo($_GET['page']=='gedung')?'active':''?>"><a href="?page=gedung"><i class="fa fa-building-o"></i> Gedung</a></li>
                        <li class="<?php echo($_GET['page']=='ruangan')?'active':''?>"><a href="?page=ruangan"><i class="fa fa-group"></i> Ruangan</a></li>
                        <li class="<?php echo($_GET['page']=='prodi')?'active':''?>"><a href="?page=prodi"><i class="fa fa-flag-o"></i> Prodi</a></li>
                        <li class="<?php echo($_GET['page']=='konsentrasi')?'active':''?>"><a href="?page=konsentrasi"><i class="fa fa-cogs"></i> Konsentrasi</a></li>
                        <li class="<?php echo($_GET['page']=='dosen')?'active':''?>"><a href="?page=dosen"><i class="fa fa-user"></i> Dosen</a></li>
                        <li class="<?php echo($_GET['page']=='kel_matkul')?'active':''?>"><a href="?page=kel_matkul"><i class="fa fa-users"></i> Kelompok Mata Kuliah</a></li>
                        <li class="<?php echo($_GET['page']=='grade_nilai')?'active':''?>"><a href="?page=grade_nilai"><i class="fa fa-book"></i> Grade Nilai</a></li>
                        <li class="<?php echo($_GET['page']=='tahun_angkatan')?'active':''?>"><a href="?page=tahun_angkatan"><i class="fa fa-sitemap"></i> Tahun Angkatan</a>
                    </ul>
                </li>
                <li class="<?php echo($_GET['page']=='mahasiswa')?'active':''?>">
                    <a href="?page=mahasiswa">
                        <i class="fa fa-group"></i>
                        <span>Mahasiswa</span>
                    </a>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-suitcase"></i>
                        <span>Akademik</span> <b class=" fa fa-angle-down"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo($_GET['page']=='thn_akademik')?'active':''?>"><a href="?page=thn_akademik"><i class="fa fa-bookmark"></i> Tahun Akademik</a></li>
                        <li class="<?php echo($_GET['page']=='mata_kuliah')?'active':''?>"><a href="?page=mata_kuliah"><i class="fa fa-bullhorn"></i> Mata Kuliah</a></li>
                        <li class="<?php echo($_GET['page']=='jadwal_kuliah')?'active':''?>"><a href="?page=jadwal_kuliah"><i class="fa fa-calendar-o"></i> Jadwal Kuliah</a></li>
                        <li class="<?php echo($_GET['page']=='registrasi')?'active':''?>"><a href="?page=registrasi"><i class="fa fa-credit-card"></i> Registrasi</a></li>
                        <li class="<?php echo($_GET['page']=='krs')?'active':''?>"><a href="?page=krs"><i class="fa fa-book"></i> Kartu Rencana Studi</a></li>
                        <li class="<?php echo($_GET['page']=='khs')?'active':''?>"><a href="?page=khs"><i class="fa fa-archive"></i> Kartu Hasil Studi</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">
                        <i class="fa fa-money"></i>
                        <span>Keuangan</span> <b class=" fa fa-angle-down"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo($_GET['page']=='form_pembayaran')?'active':''?>"><a href="?page=form_pembayaran"><i class="fa fa-pencil-square-o"></i> Form Pembayaran</a></li>
                        <li class="<?php echo($_GET['page']=='jenis_pembayaran')?'active':''?>"><a href="?page=jenis_pembayaran"><i class="fa fa-gear"></i> Jenis Pembayaran</a></li>
                        <li class="<?php echo($_GET['page']=='biaya_kuliah')?'active':''?>"><a href="?page=biaya_kuliah"><i class="fa fa-envelope"></i> Biaya Kuliah</a></li>
                        <li class="<?php echo($_GET['page']=='laporan_keuangan')?'active':''?>"><a href="?page=laporan_keuangan"><i class="fa fa-book"></i> Laporan Keuangan</a></li>
                    </ul>
                </li>
                <li class="<?php echo($_GET['page']=='pengguna')?'active':''?>">
                    <a href="?page=pengguna">
                        <i class="fa fa-user"></i>
                        <span>Pengguna Sistem</span>
                    </a>
                </li>
            </ul>


        </div>
        <div class="top-nav hr-top-nav">
            <ul class="nav pull-right top-menu">
                <!-- user login dropdown start-->
                <li class="dropdown">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <img alt="" src="assets/images/avatar1_small.jpg">
                        <span class="username">John Doe</span>
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu extended logout">
                        <li><a href="#"><i class=" fa fa-suitcase"></i>Profile</a></li>
                        <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="#"><i class="fa fa-bell-o"></i> Notification</a></li>
                        <li><a href="login.html"><i class="fa fa-key"></i> Log Out</a></li>
                    </ul>
                </li>
                <!-- user login dropdown end -->
            </ul>
        </div>

    </div>

</header>
<!--header end-->
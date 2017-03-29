<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <title>
        <?php
        //Menu Home
        if (@$_GET['page']=='home'|| @$_GET['page']==''){
            echo 'PROBIS - UM | HOME';
            //Menu Master Data
        }elseif($_GET['page']=='gedung'){
            echo 'PROBIS - UM | GEDUNG';
        }elseif(@$_GET['page']=='ruangan'){
            echo 'PROBIS - UM | RUANGAN';
        }elseif(@$_GET['page']=='prodi'){
            echo 'PROBIS - UM | PRODI';
        }elseif(@$_GET['page']=='konsentrasi'){
            echo 'PROBIS - UM | KONSENTRASI';
        }elseif(@$_GET['page']=='dosen'){
            echo 'PROBIS - UM | DOSEN';
        }elseif(@$_GET['page']=='kel_matkul'){
            echo 'PROBIS - UM | KELOMPOK MATA KULIAH';
        }elseif(@$_GET['page']=='grade_nilai'){
            echo 'PROBIS - UM | GRADE NILAI';
        }elseif(@$_GET['page']=='tahun_angkatan'){
            echo 'PROBIS - UM | TAHUN ANGKATAN';
        }
        //Menu Mahasiswa
        elseif(@$_GET['page']=='mahasiswa'){
            echo 'PROBIS - UM | MAHASISWA';
        }
        //Menu Akademik
        elseif(@$_GET['page']=='thn_akademik'){
            echo 'PROBIS - UM | TAHUN AKADEMIK';
        }elseif(@$_GET['page']=='mata_kuliah'){
            echo 'PROBIS - UM | MATA KULIAH';
        }elseif(@$_GET['page']=='jadwal_kuliah'){
            echo 'PROBIS - UM | JADWAL KULIAH';
        }elseif(@$_GET['page']=='registrasi'){
            echo 'PROBIS - UM | REGISTRASI';
        }elseif(@$_GET['page']=='krs'){
            echo 'PROBIS - UM | KARTU RENCANA STUDI';
        }elseif(@$_GET['page']=='khs'){
            echo 'PROBIS - UM | KARTU HASIL STUDI';
        }
        //Menu Keuangan
        elseif(@$_GET['page']=='form_pembayaran'){
            echo 'PROBIS - UM | FORM PEMBAYARAN';
        }elseif(@$_GET['page']=='jenis_pembayaran'){
            echo 'PROBIS - UM | JENIS PEMBAYARAN';
        }elseif(@$_GET['page']=='biaya_kuliah'){
            echo 'PROBIS - UM | BIAYA KULIAH';
        }elseif(@$_GET['page']=='laporan_keuangan'){
            echo 'PROBIS - UM | LAPORAN KEUANGAN';
        }
        //Menu Pengguna
        elseif(@$_GET['page']=='pengguna'){
            echo 'PROBIS - UM | USER';
        }
        ?>
    </title>

    <!--Core CSS -->
    <link href="assets/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-reset.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <link rel="stylesheet" href="assets/js/data-tables/DT_bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap-datepicker/css/datepicker.css" />

    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]>
    <script src="assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.assets/js/1.3.0/respond.min.js"></script>


    <![endif]-->
</head>
<body class="full-width">

<section id="container" class="hr-menu">
    <!-- Top Navbar Start -->
    <?php include './view/top-navbar.php'; ?>
    <!-- Top Navbar Ends -->
    <aside>
        <!-- sidebar menu start-->

        <!-- sidebar menu end-->
    </aside>
    <!--sidebar end-->
    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            <!-- page start-->
            <div class="row">
                <div class="col-lg-12">
                    <!--breadcrumbs start -->
                    <ul class="breadcrumb">
                        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
                        <?php
                        //Menu Home
                        if (@$_GET['page']=='home'|| @$_GET['page']==''){
                            echo '<li class="active">Dashboard</li>';
                            //Menu Master Data
                        }elseif($_GET['page']=='gedung'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Gedung</a></li>
                                        <li class="active">Edit Data Gedung</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Gedung</a></li>
                                        <li class="active">Tambah Data Gedung</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Gedung</li>';}
                        }elseif(@$_GET['page']=='ruangan'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Ruangan</a></li>
                                        <li class="active">Edit Data Ruangan</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Ruangan</a></li>
                                        <li class="active">Tambah Data Ruangan</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Ruangan</li>';}
                        }elseif(@$_GET['page']=='prodi'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Prodi</a></li>
                                        <li class="active">Edit Data Prodi</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Prodi</a></li>
                                        <li class="active">Tambah Data Prodi</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Prodi</li>';}
                        }elseif(@$_GET['page']=='konsentrasi'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Konsentrasi</a></li>
                                        <li class="active">Edit Data Konsentrasi</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Ruangan</a></li>
                                        <li class="active">Tambah Data Ruangan</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Konsentrasi</li>';}
                        }elseif(@$_GET['page']=='dosen'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Dosen</a></li>
                                        <li class="active">Edit Data Dosen</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Dosen</a></li>
                                        <li class="active">Tambah Data Dosen</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Dosen</li>';}
                        }elseif(@$_GET['page']=='kel_matkul'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Kelompok Mata Kuliah</a></li>
                                        <li class="active">Edit Data Kelompok Mata Kuliah</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Kelompok Mata Kuliah</a></li>
                                        <li class="active">Tambah Data Kelompok Mata Kuliah</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Kelompok Mata Kuliah</li>';}
                        }elseif(@$_GET['page']=='grade_nilai'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Grade Nilai</a></li>
                                        <li class="active">Edit Data Grade Nilai</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Grade Nilai</a></li>
                                        <li class="active">Tambah Data Grade Nilai</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Grade Nilai</li>';}
                        }elseif(@$_GET['page']=='tahun_angkatan'){
                            if (isset($_GET['edit'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Tahun Angkatan</a></li>
                                        <li class="active">Edit Data Tahun Angkatan</li>';
                            }elseif(isset($_GET['tambah_data'])){
                                echo '<li><a href="#">Master Data</a></li>
                                        <li><a href="#">Tahun Angkatan</a></li>
                                        <li class="active">Tambah Data Tahun Angkatan</li>';
                            }else{
                                echo '<li><a href="#">Master Data</a></li>
                                        <li class="active">Tahun Angkatan</li>';}
                        }
                        //Menu Mahasiswa
                        elseif(@$_GET['page']=='mahasiswa') {
                            if (isset($_GET['page']) == 'mahasiswa' and isset($_GET['tambah_data'])) {
                                echo '<li><a href="#">Mahasiswa</a></li>
                                        <li class="active">Tambah Data Mahasiswa</li>';
                            }elseif (isset($_GET['page']) == 'mahasiswa' and isset($_GET['edit'])) {
                                echo '<li><a href="#">Mahasiswa</a></li>
                                        <li class="active">Edit Data Mahasiswa</li>';
                            }else{
                                echo '<li class="active">Mahasiswa</li>';
                            }
                        }
                        //Menu Akademik
                        elseif(@$_GET['page']=='thn_akademik'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Tahun Akademik</li>';
                        }elseif(@$_GET['page']=='mata_kuliah'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Mata Kuliah</li>';
                        }elseif(@$_GET['page']=='jadwal_kuliah'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Jadwal Kuliah</li>';
                        }elseif(@$_GET['page']=='registrasi'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Registrasi</li>';
                        }elseif(@$_GET['page']=='krs'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Kartu Rencana Studi</li>';
                        }elseif(@$_GET['page']=='khs'){
                            echo '<li><a href="#">Akademik</a></li>
                        <li class="active">Kartu Hasil Studi</li>';
                        }
                        //Menu Keuangan
                        elseif(@$_GET['page']=='form_pembayaran'){
                            echo '<li><a href="#">Keuangan</a></li>
                        <li class="active">Form Pembayaran</li>';
                        }elseif(@$_GET['page']=='jenis_pembayaran'){
                            echo '<li><a href="#">Keuangan</a></li>
                        <li class="active">Jenis Pembayaran</li>';
                        }elseif(@$_GET['page']=='biaya_kuliah'){
                            echo '<li><a href="#">Keuangan</a></li>
                        <li class="active">Biaya Kuliah</li>';
                        }elseif(@$_GET['page']=='laporan_keuangan'){
                            echo '<li><a href="#">Keuangan</a></li>
                        <li class="active">Laporan Keuangan</li>';
                        }
                        //Menu Pengguna
                        elseif(@$_GET['page']=='pengguna'){
                            echo '<li class="active">Pengguna Sistem</li>';
                        }
                        ?>
                    </ul>
                    <!--breadcrumbs end -->
                </div>
            </div>
            <?php
            //Menu Home
            if (@$_GET['page']=='home'|| @$_GET['page']==''){
                include './view/home.php';
                //Menu Master Data
            }elseif($_GET['page']=='gedung'){
                include './view/gedung.php';
            }elseif(@$_GET['page']=='ruangan'){
                include './view/ruangan.php';
            }elseif(@$_GET['page']=='prodi'){
                include './view/prodi.php';
            }elseif(@$_GET['page']=='konsentrasi'){
                include './view/konsentrasi.php';
            }elseif(@$_GET['page']=='dosen'){
                include './view/dosen.php';
            }elseif(@$_GET['page']=='kel_matkul'){
                include './view/kel_matkul.php';
            }elseif(@$_GET['page']=='grade_nilai'){
                include './view/grade_nilai.php';
            }elseif(@$_GET['page']=='tahun_angkatan'){
                include './view/tahun_angkatan.php';
            }
            //Menu Mahasiswa
            elseif(@$_GET['page']=='mahasiswa'){
                if (isset($_GET['page'])=='mahasiswa' and isset($_GET['tambah_data'])){
                    include './view/mahasiswa_input.php';
                }elseif (isset($_GET['page'])=='mahasiswa' and isset($_GET['edit'])){
                    include './view/mahasiswa_edit.php';
                }else{
                    include './view/mahasiswa.php';
                }
            }
            //Menu Akademik
            elseif(@$_GET['page']=='thn_akademik'){
                include './view/thn_akademik.php';
            }elseif(@$_GET['page']=='mata_kuliah'){
                include './view/mata_kuliah.php';
            }elseif(@$_GET['page']=='jadwal_kuliah'){
                include './view/jadwal_kuliah.php';
            }elseif(@$_GET['page']=='registrasi'){
                include './view/registrasi.php';
            }elseif(@$_GET['page']=='krs'){
                include './view/krs.php';
            }elseif(@$_GET['page']=='khs'){
                include './view/khs.php';
            }
            //Menu Keuangan
            elseif(@$_GET['page']=='form_pembayaran'){
                include './view/form_pembayaran.php';
            }elseif(@$_GET['page']=='jenis_pembayaran'){
                include './view/jenis_pembayaran.php';
            }elseif(@$_GET['page']=='biaya_kuliah'){
                include './view/biaya_kuliah.php';
            }elseif(@$_GET['page']=='laporan_keuangan'){
                include './view/laporan_keuangan.php';
            }
            //Menu Pengguna
            elseif(@$_GET['page']=='pengguna'){
                include './view/user.php';
            }
            ?>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->
    <!--footer start-->
    <?php
    include './view/footer.php';
    ?>
    <!--footer end-->
    <!--right sidebar start-->
    <div class="right-sidebar">
        <div class="search-row">
            <input type="text" placeholder="Search" class="form-control">
        </div>
        <div class="right-stat-bar">
            <ul class="right-side-accordion">
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head red-bg active clearfix">
                        <span class="pull-left">work progress (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row side-mini-stat clearfix">
                                <div class="side-graph-info">
                                    <h4>Target sell</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="target-sell">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>product delivery</h4>
                                    <p>
                                        55%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-delivery">
                                        <div class="sparkline" data-type="bar" data-resize="true" data-height="30" data-width="90%" data-bar-color="#39b7ab" data-bar-width="5" data-data="[200,135,667,333,526,996,564,123,890,564,455]">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info payment-info">
                                    <h4>payment collection</h4>
                                    <p>
                                        25%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="p-collection">
						<span class="pc-epie-chart" data-percent="45">
						<span class="percent"></span>
						</span>
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="side-graph-info">
                                    <h4>delivery pending</h4>
                                    <p>
                                        44%, Deadline 12 june 13
                                    </p>
                                </div>
                                <div class="side-mini-graph">
                                    <div class="d-pending">
                                    </div>
                                </div>
                            </div>
                            <div class="prog-row side-mini-stat">
                                <div class="col-md-12">
                                    <h4>total progress</h4>
                                    <p>
                                        50%, Deadline 12 june 13
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div style="width: 50%" aria-valuemax="100" aria-valuemin="0" aria-valuenow="20" role="progressbar" class="progress-bar progress-bar-info">
                                            <span class="sr-only">50% Complete</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head terques-bg active clearfix">
                        <span class="pull-left">contact online (5)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="assets/images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Jonathan Smith</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="assets/images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Anjelina Joe</a></h4>
                                    <p>
                                        Available
                                    </p>
                                </div>
                                <div class="user-status text-success">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="assets/images/chat-avatar2.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">John Doe</a></h4>
                                    <p>
                                        Away from Desk
                                    </p>
                                </div>
                                <div class="user-status text-warning">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="assets/images/avatar1_small.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Mark Henry</a></h4>
                                    <p>
                                        working
                                    </p>
                                </div>
                                <div class="user-status text-info">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb">
                                    <a href="#"><img src="assets/images/avatar1.jpg" alt=""></a>
                                </div>
                                <div class="user-details">
                                    <h4><a href="#">Shila Jones</a></h4>
                                    <p>
                                        Work for fun
                                    </p>
                                </div>
                                <div class="user-status text-danger">
                                    <i class="fa fa-comments-o"></i>
                                </div>
                            </div>
                            <p class="text-center">
                                <a href="#" class="view-btn">View all Contacts</a>
                            </p>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head purple-bg active">
                        <span class="pull-left"> recent activity (3)</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        just now
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        2 min ago
                                    </p>
                                    <p>
                                        <a href="#">Jane Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                            <div class="prog-row">
                                <div class="user-thumb rsn-activity">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="rsn-details ">
                                    <p class="text-muted">
                                        1 day ago
                                    </p>
                                    <p>
                                        <a href="#">Jim Doe </a>Purchased new equipments for zonal office setup
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="widget-collapsible">
                    <a href="#" class="head widget-head yellow-bg active">
                        <span class="pull-left"> shipment status</span>
                        <span class="pull-right widget-collapse"><i class="ico-minus"></i></span>
                    </a>
                    <ul class="widget-container">
                        <li>
                            <div class="col-md-12">
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                            <span class="sr-only">40% Complete</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="prog-row">
                                    <p>
                                        Full sleeve baby wear (SL: 17665)
                                    </p>
                                    <div class="progress progress-xs mtop10">
                                        <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                            <span class="sr-only">70% Completed</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <!--right sidebar end-->

</section>

<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/jquery-1.8.3.min.js"></script>
<script src="assets/bs3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/hover-dropdown.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jQuery-slimScroll-1.3.0/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.nicescroll.js"></script>
<script type="text/javascript" src="assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<!--Easy Pie Chart-->
<script src="assets/js/easypiechart/jquery.easypiechart.js"></script>
<!--Sparkline Chart-->
<script src="assets/js/sparkline/jquery.sparkline.js"></script>
<!--jQuery Flot Chart-->
<script src="assets/js/flot-chart/jquery.flot.js"></script>
<script src="assets/js/flot-chart/jquery.flot.tooltip.min.js"></script>
<script src="assets/js/flot-chart/jquery.flot.resize.js"></script>
<script src="assets/js/flot-chart/jquery.flot.pie.resize.js"></script>

<script type="text/javascript" src="assets/js/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/js/data-tables/DT_bootstrap.js"></script>

<!--common script init for all pages-->
<script src="assets/js/scripts.js"></script>

<!--script for this page only-->
<script src="assets/js/table-editable.js"></script>

<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function() {
        EditableTable.init();
    });
</script>



</body>
</html>

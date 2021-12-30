<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?=$title?></title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?=base_url()?>/assets/focus/images/Logo.jpg">
    <link rel="stylesheet" href="<?=base_url()?>/assets/focus/vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?=base_url()?>/assets/focus/vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="<?=base_url()?>/assets/focus/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/focus/vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="<?=base_url()?>/assets/focus/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <!-- SELECT -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <!-- AJAX -->

    <style>
        .stepwizard-step p {
            margin-top: 10px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 50%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .show {
            display: block;
        }
        .hidden {
            display: none;
        }

        .countup {
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header" style="background-color:#343957;height:40px;">
            <a href="#" class="brand-logo">
                <img class="logo-abbr" src="<?=base_url()?>/assets/focus/images/Logo.jpg" alt="" style="border-radius:30px;">
                <p class="logo-compact" style="width:300px;">Simpan Berkas</p>
                <p class="brand-title" style="width:300px;">Simpan Berkas</p>
            </a>

            <div class="nav-control" style="margin-left:200px;">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header" style="height:40px;">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <!-- <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </form>
                                </div>
                            </div> -->
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown" style="font-size:14px;">
                                    <i class="mdi mdi-account"></i> Halo <?= $this->session->userdata('SCUSG');?>, <?= $this->session->userdata('SCUSI');?>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profil </span>
                                    </a>
                                    <a href="<?=base_url()?>Login/logout" class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <?php if($this->session->userdata('SCUSG') == 'BPKAD' || $this->session->userdata('SCUSG') == 'Administrator') {?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav" style="margin-top:-40px;;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="javascript:void()" aria-expanded="false"><i class="fa fa-tachometer-alt"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-database"></i><span class="nav-text">Master Data</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?=base_url()?>MasterUnitKerja/index">Master Unit Kerja</a></li>
                            <li><a href="<?=base_url()?>PartnerBisnis/index">Master Partner Bisnis</a></li>
                            <li><a href="<?=base_url()?>UserLogin/index">User Login</a></li>
                            <li><a href="<?=base_url()?>MasterLokasi/index">Master Lokasi</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-sliders-h"></i><span class="nav-text">Konfigurasi</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                    </li>
                    <li><a href="<?=base_url()?>BerkasBaru/daftar_berkas" aria-expanded="false"><i class="fa fa-folder"></i><span class="nav-text">Berkas</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-folder-plus"></i><span class="nav-text">Berkas Baru</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?=base_url()?>BerkasBaru/index">Tambah Berkas Baru</a></li>
                            <li><a href="<?=base_url()?>BerkasBaru/Berkas_baru_bpkad_pengajuan">Pengajuan Berkas Baru</a></li>
                            <li><a href="<?=base_url()?>BerkasBaru/History_berkas_baru">History Berkas Baru</a></li>
                            <li><a href="<?=base_url()?>BerkasBaru/Upload_BA">Upload Berita Acara</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-paste"></i><span class="nav-text">Pinjam Berkas</span></a>
                        <ul aria-expanded="false">
                            <!-- <li><a href="<?=base_url()?>PinjamBerkas/index">Tambah Pinjam Berkas</a></li> -->
                            <li><a href="<?=base_url()?>PinjamBerkas/PinjamBerkas_BPKAD_index">Pengajuan Peminjaman</a></li>
                            <li><a href="<?=base_url()?>PinjamBerkas/History_Pinjam_Berkas">History Pinjam Berkas</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-folder-minus"></i><span class="nav-text">Berkas Keluar</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?=base_url()?>PinjamBerkas/Berkas_keluar">Berkas Keluar</a></li>
                            <li><a href="<?=base_url()?>PinjamBerkas/History">History Berkas Keluar</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-folder"></i><span class="nav-text">Laporan</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-info-circle"></i><span class="nav-text">Informasi</span></a>
                        <ul aria-expanded="false">
                            <li><a href="#">Lorem Ipsum</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <?php } else if($this->session->userdata('SCUSG') == 'OPD') {?>
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav" style="margin-top:-40px;;">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li><a href="javascript:void()" aria-expanded="false"><i class="fa fa-tachometer-alt"></i><span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a href="<?=base_url()?>BerkasBaru/Daftar_berkas_opd" aria-expanded="false"><i class="fa fa-folder"></i><span class="nav-text">Berkas</span></a>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-folder-plus"></i><span class="nav-text">Berkas Baru</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?=base_url()?>BerkasBaru/index">Pengajuan Berkas Baru</a></li>
                            <li><a href="<?=base_url()?>BerkasBaru/History_berkas_baru">History Berkas Baru</a></li>
                            <li><a href="<?=base_url()?>BerkasBaru/Upload_BA">Upload Berita Acara</a></li>
                        </ul>
                    </li>

                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i class="fa fa-paste"></i><span class="nav-text">Pinjam Berkas</span></a>
                        <ul aria-expanded="false">
                            <li><a href="<?=base_url()?>PinjamBerkas/index">Pengajuan Pinjam Berkas</a></li>
                            <li><a href="<?=base_url()?>PinjamBerkas/History_Pinjam_Berkas">History Pinjam Berkas</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
        <?php }?>
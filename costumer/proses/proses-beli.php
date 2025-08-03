<?php

include("../../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    $kd_pemesanan = $_POST['kd_pemesanan'];
    $kd_pembayaran = $_POST['kd_pembayaran'];
    $kd_rumah = $_POST['kd_rumah'];
    $kd_marketing = $_POST['kd_marketing'];
    $status = $_POST['status'];
    $tanggal_waktu = date('Y-m-d');
    // buat query
    $sql1 = "INSERT INTO t_customer VALUES('$nik','$nama_lengkap','$alamat','$no_hp')";
    $sql2 = "INSERT INTO t_pemesanan VALUES('$kd_pemesanan','$kd_pembayaran','$nik','$kd_rumah','$tanggal_waktu')";
    $sql3 = "INSERT INTO t_pembayaran VALUES('$kd_pembayaran','$kd_marketing','$status')";

    mysqli_query($db, $sql1);
    mysqli_query($db, $sql2);
    mysqli_query($db, $sql3);
}
function tanggal_indonesia($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );

    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="../img/2.jpg">
    <title>TWO PROPERTI</title>
    <style>
        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 300px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }

        .price {
            color: grey;
            font-size: 22px;
        }

        .card button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #000;
            text-align: center;
            cursor: pointer;
            width: 100%;
            font-size: 18px;
        }

        .card button:hover {
            opacity: 0.7;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
    </style>
</head>

<!-- Custom fonts for this template-->
<link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:../index.php?pesan=gagal");
    }

    ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-0">
                    <p style="font-size: 20px;margin-top: 20px;font-family: Tw Cen MT;">TWO PROPERTY</p>
                </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="../index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="../catalog.php">
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <span>Catalog</span>
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link collapsed" href="../beli-rumah.php">
                    <i class="fa fa-handshake" aria-hidden="true"></i>
                    <span>Beli Rumah</span>
                </a>
            </li>







            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <img src="../../img/2.jpg" width="55" height="45">
                    <p style="font-family:Tw Cen MT; color:black; margin-top: 20px;padding-left: 10px;"><b>TWO PROPERTI</b></p>
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>




                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><b>Selamat Datang, </b><?php echo $_SESSION['username']; ?></span>
                                <img class="img-profile rounded-circle" src="../../img/user.png">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">


                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Content Row -->
                <div class="row">
                    <div class="container" style="background-color: white;"><br>
                        <?php
                        echo "Tanggal : ",  tanggal_indonesia(date('Y-m-d'));;
                        date_default_timezone_set('Asia/Jakarta');
                        $jam = date("H:i:s");
                        echo "| Pukul : <b>" . $jam . " " . "</b>";
                        $a = date("H");
                        ?><br><br>
                        <div id="print-area-2" class="print-area">
                            <div align="center" role="alert">
                                <b style="color:black;">STRUK PEMBAYARAN</b>



                                <?php
                                if (isset($_POST['daftar'])) { ?>
                                    <table align="center">
                                        <tr align="center">
                                            <td colspan="2"><B style="color: black; font-size:48px;">TWO PROPERTY</B></td>
                                            <td></td>
                                        </tr>
                                        <tr align="center">
                                            <td colspan="2"><B style="color: black;">Jl. Atlas tengah No.2 Babakan Surabaya, Kota Bandung</B></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2">
                                                <hr>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr align="center">
                                            <td colspan="2"><B style="color: black;">Property Murah, Aman, Dan Nyaman</B></td>
                                            <td></td>
                                        </tr>
                                    </table> <br>

                                    <table border="1" id="customers" style="color: black;" align="center" cellpadding="4" align="center">
                                        <tr>
                                            <td>NAMA </td>
                                            <td><?php echo $_POST['nama_lengkap'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>NIK </td>
                                            <td><?php echo $_POST['nik'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat </td>
                                            <td><?php echo $_POST['alamat'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>No HP </td>
                                            <td><?php echo $_POST['no_hp'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pemesanan </td>
                                            <td><?php echo $_POST['kd_pemesanan'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Pembayaran </td>
                                            <td><?php echo $_POST['kd_pembayaran'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Rumah </td>
                                            <td><?php echo $_POST['kd_rumah'] ?></td>
                                        </tr>
                                        <tr>
                                            <td>Status </td>
                                            <td><?php echo $_POST['status'] ?></td>
                                        </tr>

                                    </table><br><br>
                                    <p style="color: black; font-size:15px;">Terima Kasih Bpk/Ibu <b><?php echo $_POST['nama_lengkap'] ?></b> Sudah Mempercayai Kami</p>


                                <?php
                                } ?>
                            </div>
                        </div>
                        <div align="center"><a class="fas fa-print no-print" href="javascript:printDiv('print-area-2');" style="text-decoration:none;"> Cetak Struk Pembayaran</a></div>




                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Apakah Anda Yakin Untuk Logout ?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-secondary" href="../index.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <textarea id="printing-css" style="display:none;">html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;font-size:100%;font:inherit;vertical-align:baseline}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0}body{font:normal normal .8125em/1.4 Arial,Sans-Serif;background-color:white;color:#333}strong,b{font-weight:bold}cite,em,i{font-style:italic}a{text-decoration:none}a:hover{text-decoration:underline}a img{border:none}abbr,acronym{border-bottom:1px dotted;cursor:help}sup,sub{vertical-align:baseline;position:relative;top:-.4em;font-size:86%}sub{top:.4em}small{font-size:86%}kbd{font-size:80%;border:1px solid #999;padding:2px 5px;border-bottom-width:2px;border-radius:3px}mark{background-color:#ffce00;color:black}p,blockquote,pre,table,figure,hr,form,ol,ul,dl{margin:1.5em 0}hr{height:1px;border:none;background-color:#666}h1,h2,h3,h4,h5,h6{font-weight:bold;line-height:normal;margin:1.5em 0 0}h1{font-size:200%}h2{font-size:180%}h3{font-size:160%}h4{font-size:140%}h5{font-size:120%}h6{font-size:100%}ol,ul,dl{margin-left:3em}ol{list-style:decimal outside}ul{list-style:disc outside}li{margin:.5em 0}dt{font-weight:bold}dd{margin:0 0 .5em 2em}input,button,select,textarea{font:inherit;font-size:100%;line-height:normal;vertical-align:baseline}textarea{display:block;-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box}pre,code{font-family:"Courier New",Courier,Monospace;color:inherit}pre{white-space:pre;word-wrap:normal;overflow:auto}blockquote{margin-left:2em;margin-right:2em;border-left:4px solid #ccc;padding-left:1em;font-style:italic}table[border="1"] th,table[border="1"] td,table[border="1"] caption{border:1px solid;padding:.5em 1em;text-align:left;vertical-align:top}th{font-weight:bold}table[border="1"] caption{border:none;font-style:italic}.no-print{display:none}</textarea>
    <iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>

    <script>
        function printDiv(elementId) {
            var a = document.getElementById('printing-css').value;
            var b = document.getElementById(elementId).innerHTML;
            window.frames["print_frame"].document.title = document.title;
            window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
            window.frames["print_frame"].window.focus();
            window.frames["print_frame"].window.print();
        }
    </script>

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../js/demo/chart-area-demo.js"></script>
    <script src="../../js/demo/chart-pie-demo.js"></script>

</body>

</html>
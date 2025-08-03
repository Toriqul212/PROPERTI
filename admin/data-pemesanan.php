<?php include("../koneksi.php");
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
} ?>
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
</head>

<!-- Custom fonts for this template-->
<link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="../css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Home</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="data-rumah.php">
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <span>Data Rumah</span>
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link collapsed" href="data-pemesanan.php">
                    <i class="fa fa-handshake" aria-hidden="true"></i>
                    <span>Data Pemesanan</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link collapsed" href="data-pembayaran.php">
                    <i class="fa fa-credit-card" aria-hidden="true"></i>
                    <span>Data Pembayaran</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-cog"></i>
                    <span>Option</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Kategori Option</h6>
                        <a class="collapse-item" href="option/option-akun.php">Option Akun</a>
                        <a class="collapse-item" href="option/option-datarumah.php">Option Data Rumah</a>
                        <a class="collapse-item" href="option/option-pemesanan.php">Option Data Pemesanan</a>
                    </div>
                </div>
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
                    <img src="../img/2.jpg" width="55" height="45">
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
                                <img class="img-profile rounded-circle" src="../img/user.png">
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

                        <!-- Modal -->

                        <div class="container-fluid">

                            <div class="input-group">
                                <div class="form-outline">
                                    <form method="get" action="data-pemesanan.php">
                                        <input type="text" placeholder="Search Kode Pemesanan...." name="cari" autocomplete="off" class="form-control" />

                                </div>
                                <button type="submit" value="cari" class="btn btn-dark">
                                    <i class="fas fa-search"></i>

                                </button>
                            </div>
                            <?php

                            error_reporting(0);
                            if (isset($_GET['cari'])) {
                                $cari = $_GET['cari'];
                            } ?> <br>
                            <?php
                            //Validasi untuk menampilkan pesan pemberitahuan
                            if (isset($_GET['status'])) {

                                if ($_GET['status'] == 'sukses') {
                                    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                    <strong>Berhasil!!! </strong> Mengedit Data Pemesan
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>";
                                }
                            }
                            ?>
                            </form>

                            <table class="table table-striped">
                                <tr align="center">
                                    <th>Kode Pemesanan</th>
                                    <th>Kode Pembayaran</th>
                                    <th>NIK</th>
                                    <th>Kode Rumah</th>
                                    <th>Tanggal & Waktu</th>
                                    <th>No HP</th>
                                </tr>

                                <?php
                                $sql = "SELECT * 
                               FROM t_pemesanan 
                               JOIN t_customer 
                               ON t_pemesanan.nik =t_customer.nik WHERE kd_pemesanan LIKE '%" . $cari . "%'";
                                $query = mysqli_query($db, $sql);
                                while ($siswa = mysqli_fetch_array($query)) { ?>
                                    <tr>
                                        <td align="center"><?php echo $siswa['kd_pemesanan'] ?></td>
                                        <td align="center"><?php echo $siswa['kd_pembayaran'] ?></td>
                                        <td align="center"><?php echo $siswa['nik'] ?></td>
                                        <td align="center"><?php echo $siswa['nama_lengkap'] ?></td>
                                        <td align="center"><?php echo $siswa['alamat'] ?></td>
                                        <td align="center"><?php echo $siswa['no_hp'] ?></td>

                                    <?php } ?>
                                    </tr>
                            </table>







                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->


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

    <!-- Bootstrap core JavaScript-->
    <script type="text/javascript">
        var rupiah = document.getElementById('rupiah');
        rupiah.addEventListener('keyup', function(e) {
            // tambahkan 'Rp.' pada saat form di ketik
            // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
            rupiah.value = formatRupiah(this.value);
        });

        /* Fungsi formatRupiah */
        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            // tambahkan titik jika yang di input sudah menjadi angka ribuan
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix == undefined ? rupiah : (rupiah ? '' + rupiah : '');
        }
    </script>

    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
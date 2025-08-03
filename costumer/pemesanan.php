<?php

include("../koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {

    // ambil data dari formulir
    $nik = $_POST['nik'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    // buat query
    $sql = "INSERT INTO t_customer (nik, nama_lengkap, alamat, no_hp) 
    VALUES ('$nik', '$nama_lengkap', '$alamat', '$no_hp')";
    $query = mysqli_query($db, $sql);
}
?>
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
    </style>
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
                <a class="nav-link collapsed" href="catalog.php">
                    <i class="fa fa-inbox" aria-hidden="true"></i>
                    <span>Catalog</span>
                </a>
            </li>


            <li class="nav-item active">
                <a class="nav-link collapsed" href="data-pemesanan.php">
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
                        ?><br>
                        <div class="alert alert-secondary" align="center" role="alert">
                            <b style="color:black;">FORM PEMBELIAN RUMAH</b>
                        </div>
                        <table align="center">
                            <tr>
                                <td>
                                    <div class="card">
                                        <img src="../img/property/Rekomendasi1.png" alt="Denim Jeans" style="width:100%">
                                        <h1>Tailored Jeans</h1>
                                        <p class="price">$19.99</p>
                                        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>

                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <img src="../img/property/Rekomendasi2.png" alt="Denim Jeans" style="width:100%">
                                        <h1>Tailored Jeans</h1>
                                        <p class="price">$19.99</p>
                                        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>

                                    </div>
                                </td>

                            </tr>
                        </table> <br>
                        <table align="center">
                            <tr>
                                <td>
                                    <div class="card">
                                        <img src="../img/property/Rekomendasi3.png" alt="Denim Jeans" style="width:100%">
                                        <h1>Tailored Jeans</h1>
                                        <p class="price">$19.99</p>
                                        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>

                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <img src="../img/property/Rekomendasi4.png" alt="Denim Jeans" style="width:100%">
                                        <h1>Tailored Jeans</h1>
                                        <p class="price">$19.99</p>
                                        <p>Some text about the jeans. Super slim and comfy lorem ipsum lorem jeansum. Lorem jeamsun denim lorem jeansum.</p>

                                    </div>
                                </td>
                            </tr>
                        </table>

                        <form action="proses/proses-beli.php" method="post" enctype="multipart/form-data">
                            <?php
                            // https://www.malasngoding.com
                            // menghubungkan dengan koneksi database
                            include '../config.php';

                            // mengambil data barang dengan kode paling besar
                            $query = mysqli_query($koneksi, "SELECT max(kd_rumah) as kodeTerbesar FROM t_pemesanan");
                            $data = mysqli_fetch_array($query);
                            $kodeRumah = $data['kodeTerbesar'];

                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan = (int) substr($kodeRumah, 3, 3);

                            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                            $urutan++;

                            // membentuk kode barang baru
                            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                            $huruf = "1";
                            $kodeBarang = $huruf . sprintf("%02s", $urutan);
                            ?>
                            <?php
                            // https://www.malasngoding.com
                            // menghubungkan dengan koneksi database
                            include '../config.php';

                            // mengambil data barang dengan kode paling besar
                            $query = mysqli_query($koneksi, "SELECT max(kd_rumah) as kodeTerbesar FROM t_pemesanan");
                            $data = mysqli_fetch_array($query);
                            $kodeRumah = $data['kodeTerbesar'];

                            // mengambil angka dari kode barang terbesar, menggunakan fungsi substr
                            // dan diubah ke integer dengan (int)
                            $urutan = (int) substr($kodeRumah, 3, 3);

                            // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
                            $urutan++;

                            // membentuk kode barang baru
                            // perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
                            // misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
                            // angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
                            $huruf = "1";
                            $kodePembayaran = $huruf . sprintf("%03s", $urutan);
                            ?>
                            <?php
                            if (isset($_POST['daftar'])) {
                                echo '<table align=center>';
                                echo '<tr><td>' . 'Nik' . '</td><td>' . $_POST['nik'] . '</td></tr>';
                            } ?>
                            <table class="table">
                                <tr>
                                    <td><b>Pembelian Unit </b></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>Kode Pemesanan</td>
                                    <td><input class="form-control" name="kd_pemesanan" autocomplete="off" value="<?php echo $kodeBarang ?>" readonly required></td>
                                </tr>
                                <tr>
                                    <td>Kode Pembayaran </td>
                                    <td><input class="form-control" name="kd_pembayaran" autocomplete="off" value="<?php echo $kodePembayaran ?>" readonly required></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td><input class="form-control" name="kd_pembayaran" autocomplete="off" value="<?php echo $kodePembayaran ?>" readonly required></td>
                                </tr>
                                <tr>
                                    <?php
                                    $con = mysqli_connect("localhost", "root", "", "db_properti");
                                    ?>
                                    <td>Kode Rumah</td>
                                    <td><select name="kd_rumah" id="id" class="form-control" onchange='changeValue2(this.value)' required>
                                            <option> Pilih </option>
                                            <?php
                                            $query = mysqli_query($con, "select * from t_rumah order by kd_rumah esc");
                                            $result = mysqli_query($con, "select * from t_rumah");
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option name="kd_rumah" value="' . $row['kd_rumah'] . '">' . $row['kd_rumah'] . '</option>';
                                            }
                                            ?>
                                        </select></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td> <button class="btn btn-dark" name="daftar">Beli</button></td>

                                </tr>

                            </table>


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

    <!-- Bootstrap core JavaScript-->
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
<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['edit'])) {

    // ambil data dari formulir
    $nik = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $alamat = $_POST['alamat'];
    $no_hp = $_POST['no_hp'];
    // buat query update
    $sql = "UPDATE t_customer SET nama_lengkap='$nama_lengkap', alamat='$alamat', no_hp='$no_hp' WHERE nik=$nik";
    $query = mysqli_query($db, $sql);

    // apakah query update berhasil?
    if ($query) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../data-pemesanan.php?status=sukses');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }
} else {
    die("Akses dilarang...");
}

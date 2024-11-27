<?php
// Set header untuk respons JSON
header('Content-Type: application/json');

// Memasukkan file koneksi dan query
require_once __DIR__ . '/../query.php';
require __DIR__ . '/../koneksi.php';
require __DIR__ . '/../function/uploadGambar.php';

// Mengecek apakah request menggunakan metode POST
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Mengambil dan men-sanitize input dari form
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $alamat = isset($_POST['alamat']) ? trim($_POST['alamat']) : '';
    $profil = uploadGambar($_FILES["profil"]);

    // Validasi input, pastikan tidak ada data yang kosong
    if (empty($nama) || empty($alamat)) {
        $response = ['error' => 'Semua kolom harus diisi.'];
    } else {
        // Memasukkan data ke dalam database menggunakan fungsi tambahData
        if (tambahData($conn, $nama, $alamat, $profil)) {
            $response = ["pesan" => "Data berhasil ditambahkan"];
        } else {
            $response = ['error' => 'Gagal menambahkan data ke database.'];
        }
    }
} else {
    $response = ['error' => 'Metode request harus POST'];
}

// Mengirimkan respons dalam format JSON
echo json_encode($response);
?>

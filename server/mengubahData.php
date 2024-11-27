<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../query.php';
require __DIR__ . '/../koneksi.php';

// Pastikan koneksi berhasil
if (!$conn) {
    echo json_encode(['error' => 'Koneksi ke database gagal.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = isset($_POST['idEdit']) ? trim($_POST['idEdit']) : '';
    $nama = isset($_POST['namaEdit']) ? trim($_POST['namaEdit']) : '';
    $alamat = isset($_POST['alamatEdit']) ? trim($_POST['alamatEdit']) : '';
    $profil = isset($_POST['profilEdit']) ? trim($_POST['profilEdit']) : '';

    if (empty($id) || empty($nama) || empty($alamat) || empty($profil)) {
        echo json_encode(['error' => 'Semua kolom harus diisi.']);
        exit;
    }

    // Update data
    if (ubahData($conn, $id, $nama, $alamat, $profil)) {
        echo json_encode(['pesan' => 'Data berhasil diperbarui.']);
    } else {
        echo json_encode(['error' => 'Gagal memperbarui data.']);
    }
} else {
    echo json_encode(['error' => 'Metode request harus POST']);
}
?>

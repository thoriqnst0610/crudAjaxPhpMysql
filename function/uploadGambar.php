<?php

// Fungsi untuk menangani upload file
function uploadGambar($file) {
    // Direktori tempat menyimpan file yang di-upload
    $targetDir = __DIR__. "/../upload/";
    $unik = uniqid();
    $targetFile = $targetDir . $unik . '-' .basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Cek apakah file gambar adalah gambar sebenarnya
    $check = getimagesize($file["tmp_name"]);
    if ($check !== false) {
        //file gambar
    } else {
        throw new Exception("maaf, File bukan gambar.");
        $uploadOk = 0;
    }

    // Cek format file
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "gif") {
        throw new Exception("maaf, Hanya format JPG, PNG, dan GIF yang diperbolehkan.");
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($file["size"] > 1000000) { // 1 MB = 1,000,000 bytes
        throw new Exception("maaf, Ukuran file terlalu besar. Maksimal 1 MB.");
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk diset ke 0 oleh kesalahan
    if ($uploadOk == 0) {
        throw new Exception("maaf, File tidak di-upload.");
    } else {
        if (move_uploaded_file($file["tmp_name"], $targetFile)) {
           //berhasil
        } else {
            throw new Exception("maaf, Terjadi kesalahan saat meng-upload file.");
        }
    }

    return $unik.'-'.basename($file["name"]);
}

?>

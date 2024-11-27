<?php

function ambilData($conn)
{

    $query = "SELECT * FROM manusia";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function ambilDataId($conn, $id)
{

    $query = "SELECT * FROM manusia WHERE id = '$id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        return $result->fetch_all(MYSQLI_ASSOC);
    } else {
        return [];
    }
}

function tambahData($conn, $nama, $alamat, $profil)
{

    $query = "INSERT INTO manusia(nama,alamat,photo) VALUES(?,?,?)";
    $statement = $conn->prepare($query);

    if ($statement === false) {

        throw new Exception("maaf," . "Prepare failed: " . $conn->error);
    }

    $statement->bind_param(
        'sss',
        $nama,
        $alamat,
        $profil
    );

    if ($statement->execute()) {

        return true;
    } else {

        throw new Exception("maaf," . "Error: " . $statement->error);
    }

    $statement->close();
    $conn->close();
}

function hapusData($conn, $id)
{
    global $conn;
    $sql = "DELETE FROM manusia WHERE id = ?";
    $statement = $conn->prepare($sql);

    if ($statement === false) {

        throw new Exception("Prepare failed: " . $conn->error);

    }

    $statement->bind_param('s', $id);
    if ($statement->execute()) {

        $pesan =  true;

    } else {

        throw new Exception("Error: " . $statement->error);

    }

    $statement->close();
    return $pesan;
    
}

function ubahData($conn, $id, $nama, $alamat, $photo)
{

    // Prepare the SQL statement for updating the category
    $sql = "UPDATE manusia SET nama = ?, alamat = ?, photo = ? WHERE id = ?";

    // Prepare the statement
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    // Bind the parameters
    $stmt->bind_param("ssss", $nama, $alamat, $photo, $id);

    // Execute the statement
    if ($stmt->execute()) {
        $pesan = "Record updated successfully";
    } else {
        $pesan = "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();

    return $pesan;
}
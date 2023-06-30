<?php
//koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "posawitondew");

function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = array();
    if($result){
    while ( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    }
    return $rows; 
 }
}

function tambah ($data) {
    global $conn;
  $alternatif = $data["alternatif"];
$keterangan= $data["keterangan"];
$query = "INSERT INTO alternatif VALUES ('','$alternatif','$keterangan')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function hapus ($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM alternatif WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $alternatif = $data["alternatif"];
    $keterangan = $data["keterangan"];
    $query = "UPDATE alternatif SET alternatif = '$alternatif', keterangan = '$keterangan' WHERE id =$id";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}


function cari ($keyword) {
    $query = "SELECT * FROM posawitondew WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword' ";
    return query ($query);
}

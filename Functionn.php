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
$kriteria = $data["kriteria"];
$jenis= $data["jenis"];
$bobot= $data["bobot"];
$query = "INSERT INTO kriteria VALUES ('','$kriteria','$jenis', '$bobot')";
mysqli_query($conn, $query);
return mysqli_affected_rows($conn);
}


function hapus ($id) {
    global $conn;
    mysqli_query($conn,"DELETE FROM kriteria WHERE id=$id");
    return mysqli_affected_rows($conn);
}

function ubah ($data) {
    global $conn;
    $id = $data["id"];
    $kriteria = $data["kriteria"];
    $jenis = $data["jenis"];
	$bobot= $data["bobot"];
    $query = "UPDATE kriteria SET kriteria = '$kriteria', jenis = '$jenis' bobot ='$bobot' WHERE id =$id";
mysqli_query($conn,$query);
return mysqli_affected_rows($conn);
}

function cari ($keyword) {
    $query = "SELECT * FROM posawitondew WHERE nama LIKE '%$keyword%' OR nim LIKE '%$keyword' ";
    return query ($query);
}

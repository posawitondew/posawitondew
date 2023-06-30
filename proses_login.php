<?php
// memulai session
session_start();
 
// menangkap data dari form
$user = $_POST['username'];
$pass = $_POST['password'];
 
// validasi nama dan nim
if($user == 'posawit' && $pass == 'ondew'){
 // memasang session dengan menyisipkan
 // data username dan password
 $_SESSION['data_username'] = $user;
 $_SESSION['data_password'] = $pass;
 
 // menampilkan pesan sukses
	echo "<meta http-equiv=refresh content=0;URL='home.php'>";
}else{
    echo "<script>alert('Anda Gagal Login')</script>";
	echo "<meta http-equiv=refresh content=0;URL='login.php'>";
}
?>
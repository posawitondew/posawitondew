<?php
require 'functionn.php';
//ambil data kriteria
$id = $_GET["id"];
//query data kriteria berdasarkan id
$kr = query ("SELECT * FROM kriteria WHERE id = $id") [0];
//query data kriteria
if ( isset($_POST["submit"]) ) {
    //cek keberhasilan data
    if ( ubah($_POST) > 0) {
          echo " <script>
        alert('data berhasil diubah!');
        document.location.href = 'kriteria.php';
        </script>";
    }else{
        echo " <script>
        alert('data gagal diubah!');
        document.location.href = 'editkriteria.php';
        </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="utf-8">
    <title>Po. Sawit Ondew</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link rel="shortcut icon" href="Logo.PNG"type="image/x-icon">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;400&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.min.css" rel="stylesheet">
	<link href="css/cruad.min.css" rel="stylesheet">

</head>
<body>
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="home.php" class="navbar-brand px-lg-4 m-0">
                <img src ="Logo.PNG" width="100px">
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto p-4">
                    <a href="login.php" class="nav-item nav-link active">Home</a>
					<div class="nav-item dropdown">
                        <a href="SPKPupuk.php" class="nav-link dropdown-toggle" data-toggle="dropdown">SPK Pupuk</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="Kriteria.php" class="dropdown-item">Kriteria</a>
							<a href="Alternatif.php" class="dropdown-item">Alternatif</a>
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="SPKPupuk.php" class="nav-link dropdown-toggle" data-toggle="dropdown"> Hasil</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="DataPupuk.php" class="dropdown-item">Data Pupuk</a>
                            <a href="Perhitungandata.php" class="dropdown-item">Perhitungan Pupuk</a>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
	 </div>
    <!-- Navbar End -->
	
	 <!-- Page Header Start -->
    <div class="container-fluid page-header mb-5 position-relative overlay-bottom">
        <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 600px">
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Kriteria</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Edit</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Kriteria</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
	
	 <!-- Service Start -->
<h1>Edit Kriteria</h1>
<form action="" method="POST">
        <table>
            <input type="hidden" name="id" value="<?= $kr["id"]; ?>"></td>
            <tr>
            <td>Kriteria</td> <td>:</td> <td> <input type="text" name="kriteria" value="<?= $kr["kriteria"]; ?>"></td>
            </tr>
             <tr>
            <td>Jenis</td> <td>:</td> <td> <input type="text" name="jenis" value="<?= $kr["jenis"]; ?>"></td>
            </tr>
			 <tr>
            <td>Bobot</td> <td>:</td> <td> <input type="text" name="bobot" value="<?= $kr["bobot"]; ?>"></td>
            </tr>
                <td><button type="submit" name="submit">Ubah Data</button></td>
                </tr>
            </table>
    </form>


 
     <!-- Service End -->
	
	 <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>
	
	 <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    </header>
</body>
</html>
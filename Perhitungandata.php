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
	<link href="css/styletabel.css" rel="stylesheet">

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
                        <a href=" " class="nav-link dropdown-toggle" data-toggle="dropdown">SPK Pupuk</a>
                        <div class="dropdown-menu text-capitalize">
                            <a href="Kriteria.php" class="dropdown-item">Kriteria</a>
							<a href="Alternatif.php" class="dropdown-item">Alternatif</a>
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href=" " class="nav-link dropdown-toggle" data-toggle="dropdown"> Hasil</a>
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
            <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">Perhitungan</h1>
            <div class="d-inline-flex mb-lg-5">
                <p class="m-0 text-white"><a class="text-white" href="">Hasil</a></p>
                <p class="m-0 text-white px-2">/</p>
                <p class="m-0 text-white">Perhitungan</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
	
	 <!-- Service Start -->
<?php
spl_autoload_register(function($class){
  require_once $class.'.php';
});

$saw = new Saw();
 ?>

 <h2>Kriteria</h2>
<table border="1" cellspacing="0" width="400" height="200">
  <tr>
    <th>No</th>
    <th>Nama Kriteria</th>
    <th>Jenis</th>
    <th>Bobot</th>
  </tr>

<?php
$no=1;
$kriteria = $saw->get_data_kriteria();
$jml_kriteria = $kriteria->rowCount();
while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td>C<?php echo $data_kriteria['id_kriteria']; ?></td>
    <td><?php echo $data_kriteria['nama_kriteria']; ?></td>
    <td><?php echo $data_kriteria['jenis']; ?></td>
    <td><?php echo $data_kriteria['bobot']; ?></td>
  </tr>

<?php } ?>
</table>

<br><br>
<hr>

<h2>Alternatif</h2>
<table border="1" cellspacing="0" width="400" height="200">
  <tr>
    <th>No</th>
    <th>Alternatif</th>
    <th>Keterangan</th>
  </tr>

<?php
$no=1;
$karyawan = $saw->get_data_karyawan();
while ($data_karyawan = $karyawan->fetch(PDO::FETCH_ASSOC)) {
?>
  <tr>
    <td>K<?php echo $data_karyawan['id_alternatif']; ?></td>
    <td><?php echo $data_karyawan['Alternatif']; ?></td>
    <td><?php echo $data_karyawan['Keterangan']; ?></td>
  </tr>

<?php } ?>
</table>

<br><br>
<hr>

<h2>Rating Kecocokan</h2>
<table border="1" cellspacing="0" height="200" width="600">

  <tr>
    <th rowspan="2">Alternatif</th>
    <th colspan="<?php echo $jml_kriteria; ?>">Kriteria</th>
  <tr>
  <?php
  $kriteria = $saw->get_data_kriteria();
  while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
  ?>
      <th>C<?php echo $data_kriteria['id_kriteria']; ?></th>

  <?php } ?>
  </tr>

  <?php
  $karyawan = $saw->get_data_karyawan();
  while ($data_karyawan = $karyawan->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <td><center>A<?php echo $data_karyawan['id_alternatif']; ?></center></td>
      <?php
      $nilai = $saw->get_data_nilai_id($data_karyawan['id_alternatif']);
      while ($data_nilai = $nilai->fetch(PDO::FETCH_ASSOC)) { ?>
        <td><center><?php echo $data_nilai['nilai']; ?></center></td>

      <?php } ?>
    </tr>

  <?php } ?>

</table>

<br><br>
<hr>


<h2>Normalisasi</h2>

<table border="1" cellspacing="0" height="200" width="600">

  <tr>
    <th rowspan="2">Alternatif</th>
    <th colspan="<?php echo $jml_kriteria; ?>">Kriteria</th>
  </tr>

  </tr>

  <tr>
  <?php
  $hasil_ranks=array();
  $kriteria = $saw->get_data_kriteria();
  while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
  ?>
      <th>C<?php echo $data_kriteria['id_kriteria']; ?></th>

  <?php } ?>
  </tr>

  <?php
  $karyawan = $saw->get_data_karyawan();
  while ($data_karyawan = $karyawan->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <td><center>A<?php echo $data_karyawan['id_alternatif']; ?></center></td>
      <?php
      // tampilkan nilai dengan id_karyawan ...
      $hasil_normalisasi=0;
      $nilai = $saw->get_data_nilai_id($data_karyawan['id_alternatif']);
      while ($data_nilai = $nilai->fetch(PDO::FETCH_ASSOC)) {
      //
        $kriteria = $saw->get_data_kriteria_id($data_nilai['id_kriteria']);
        while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
          if ($data_kriteria['jenis']=="cost") {
            $min = $saw->nilai_min($data_nilai['id_kriteria']);
            while ($data_min = $min->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                   echo number_format($hasil = $data_min['min']/$data_nilai['nilai'],2);
                      $hasil_kali = $hasil*$data_kriteria['bobot'];
                      $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                   ?>
                 </center>
              </td>
            <?php } ?>

          <?php }elseif ($data_kriteria['jenis']=="benefit") {
            $max = $saw->nilai_max($data_nilai['id_kriteria']);
            while ($data_max = $max->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                  echo $hasil = $data_nilai['nilai']/$data_max['max'];
                    $hasil_kali = $hasil*$data_kriteria['bobot'];
                    $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                  ?>
                </center>
              </td>
            <?php } ?>
          <?php }
        ?>

        <?php } } ?>

    </tr>
  <?php } ?>

</table>

<br><br>
<hr>

<h2>Pembobotan</h2>

<table border="1" cellspacing="0" height="200" width="1200">

  <tr>
    <th rowspan="2">Alternatif</th>
    <th colspan="<?php echo $jml_kriteria; ?>">Kriteria</th>
    <th rowspan="2">Hasil</th>
  </tr>

  </tr>

  <tr>
  <?php
  $kriteria = $saw->get_data_kriteria();
  while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
  ?>
      <th>C<?php echo $data_kriteria['id_kriteria']; ?></th>

  <?php } ?>
  </tr>

  <?php
  $hasil_ranks=array();
  $karyawan = $saw->get_data_karyawan();
  while ($data_karyawan = $karyawan->fetch(PDO::FETCH_ASSOC)) {
  ?>
    <tr>
      <td><center>A<?php echo $data_karyawan['id_alternatif']; ?></center></td>
      <?php
      // tampilkan nilai dengan id_karyawan ...
      $hasil_normalisasi=0;
      $nilai = $saw->get_data_nilai_id($data_karyawan['id_alternatif']);
      while ($data_nilai = $nilai->fetch(PDO::FETCH_ASSOC)) {
      //
        $kriteria = $saw->get_data_kriteria_id($data_nilai['id_kriteria']);
        while ($data_kriteria = $kriteria->fetch(PDO::FETCH_ASSOC)) {
          if ($data_kriteria['jenis']=="cost") {
            $min = $saw->nilai_min($data_nilai['id_kriteria']);
            while ($data_min = $min->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                      number_format($hasil = $data_min['min']/$data_nilai['nilai'],2);
                      echo  $hasil_kali = $hasil*$data_kriteria['bobot'];
                      $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                   ?>
                 </center>
              </td>
            <?php } ?>

          <?php }elseif ($data_kriteria['jenis']=="benefit") {
            $max = $saw->nilai_max($data_nilai['id_kriteria']);
            while ($data_max = $max->fetch(PDO::FETCH_ASSOC)) { ?>
              <td>
                <center>
                  <?php
                    $hasil = $data_nilai['nilai']/$data_max['max'];
                    echo $hasil_kali = $hasil*$data_kriteria['bobot'];
                    $hasil_normalisasi=$hasil_normalisasi+$hasil_kali;

                  ?>
                </center>
              </td>
            <?php } ?>
          <?php }
        ?>

        <?php } } ?>

      <td><center>

        <?php

        $hasil_rank['nilai'] = $hasil_normalisasi;
        $hasil_rank['Alternatif'] = $data_karyawan['Alternatif'];
        array_push($hasil_ranks,$hasil_rank);
        echo $hasil_normalisasi; ?>
      </<center>
      </td>
    </tr>
  <?php } ?>

</table>

<br><br>
<hr>

<h2>Hasil Ranking</h2>

<table border="1" cellspacing="0" height="200" width="400">
  <tr>
    <th>Ranking</th>
    <th>Alternatif</th>
    <th>Nilai Akhir</th>
  </tr>

  <?php
   $no=1;
   rsort($hasil_ranks);
   foreach ($hasil_ranks as $rank) { ?>
  <tr>
    <td><center><?php echo $no++ ?></center></td>
    <td><center><?php echo $rank['Alternatif']; ?></center></td>
    <td><center><?php echo $rank['nilai']; ?></center></td>
  </tr>
  <?php } ?>
</table>

<br><br>

<center>Audria Septiani -  <?php echo date("Y"); ?> </center>
<br><br>


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
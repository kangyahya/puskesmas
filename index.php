<!doctype html>
<?php
session_start();
if($_SESSION['status']!="login"){
    header("location:login.php?pesan=belum_login");
}
include('inc/constant.php');
include('inc/config.php');

if(isset($_GET['page'])){
    $page = $_GET['page'];
} else{
    $page = "";
}
if(isset($_GET['op'])){
    $op = $_GET['op'];
} else{
    $op = "";
}
if ($page == "") {
    if ($op == "") {
        $page = MODULE_PATH . 'dashboard/dashboard';
    } else {
        $page = $op;
    }
} else {
    if (preg_match('/_/i', $page)) {
        $modname = explode('_', $page);
        $page = MODULE_PATH . $modname[0] . '/' . $page;
    } else {

        $page = MODULE_PATH . $page . '/' . $page;
    }
}
?>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="fontawasome/css/all.min.css">

    <title>Puskesmas</title>
  </head>
  <body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-green fixed-top">
      <a class="navbar-brand" href="#">Puskesmas Gratis Cirebon</a>
        <!-- logout -->
        <div class="icon ml-auto">
          <h5>
            <a href="logout.php" class="text-white">Sign Out</i></a>
          </h5>
        </div>
        <!-- end -->
      </div>
    </nav>

    <!-- bagian Kanan -->
    <div class="row no-gutters mt-5">
      <div class="col-md-2 bg-dark mt-2 pr-3 pt-4">
        <ul class="nav flex-column ml-3 mb-5">
          <li class="nav-item">
            <a class="nav-link active text-white" href="?page=dashboard">Dashboard</a> <hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=pasien">Data Pasien</a> <hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=kunjungan">Kunjungan Pasien</a> <hr class="bg-secondary">
          </li>
          <li class="nav-item">
            <a class="nav-link text-white" href="?page=user">Users</a> <hr class="bg-secondary">
          </li>
        </ul>
      </div>

      <!-- bagian Utama -->
       <div class="col-md-10 p-5 pt-2">
        <?php
          if(!file_exists($page.'.php')){
              
             echo "Module tidak ditemukan";
             
          } else {
                include $page.'.php';
          
          }
        ?>
      </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script type="text/javascript" src="dist/sweetalert.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
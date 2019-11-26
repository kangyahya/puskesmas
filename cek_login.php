<?php 

include('inc/config.php');
// mengaktifkan session php
session_start();
 
// menghubungkan dengan koneksi
 
// menangkap data yang dikirim dari form
foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($connect,$value); }
$username = $_POST['username'];
 
// menyeleksi data admin dengan username dan password yang sesuai
$sql = "select * from tbl_user where username='{$_POST['username']}' and password='{$_POST['password']}'";

$result = $connect->query($sql);

echo $result->num_rows;
if($result->num_rows > 0){
	$_SESSION['username'] = $username;
	$_SESSION['status'] = "login";
	header("location:index.php?page=dashboard");
}else{
	header("location:login.php?pesan=gagal");
}
?>
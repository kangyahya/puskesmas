<?php
if (isset($_POST['submitted'])) {
  # code...
  foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($connect,$value); }
  $sql = "INSERT INTO tbl_pasien (id_pasien, nama_pasien, tgl_lahir, jk, nama_kk, alamat) VALUES ('{$_POST['fr_id_pasien']}','{$_POST['fr_nama_pasien']}','{$_POST['fr_tgl_lahir']}','{$_POST['jk']}','{$_POST['fr_nama_kk']}','{$_POST['fr_alamat']}')";
  $connect->query($sql);
  header('location:?page=pasien');
}

$query = "SELECT max(id_pasien) as id from tbl_pasien";
$result = $connect->query($query);
$data = $result->fetch_array();
$id_pasien = $data['id'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'P001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($id_pasien, 3, 3);
 
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
 
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "P";
$id_pasien = $char . sprintf("%03s", $noUrut);

?>
          <h2>Input Data Pasien</h2> <hr> <br>
          <form action="" method="POST">
            <div class="form-group">
              <label>ID Pasien : </label>
              <input class="form-control" type="text" name="fr_id_pasien" value="<?php echo $id_pasien?>">
            </div>
            <div class="form-group">
              <label>Nama Pasien : </label>
              <input class="form-control" type="text" name="fr_nama_pasien">
            </div>
            <div class="form-group">
              <label>Tanggal Lahir : </label>
              <input class="form-control" type="date" name="fr_tgl_lahir">
            </div>
            
            <div class="form-group">
              <label>Jenis Kelamin </label>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jk" value="P">
                <label class="form-check-label mr-5">
                  Perempuan
                </label>
                 <input class="form-check-input" type="radio" name="jk" value="L">
                <label class="form-check-label">
                  Laki-laki
                </label>
              </div>
            </div>

            <div class="form-group">
              <label>Nama KK: </label>
              <input class="form-control" type="text" name="fr_nama_kk", value="">
            </div>
            <div class="form-group">
              <label>Alamat : </label>
              <input class="form-control" type="text" name="fr_alamat", value="">
            </div>
            <button class="btn btn-primary">Simpan</button>
            <input type="hidden" name="submitted">

          </form>
<?php
if (isset($_POST['submitted'])) {
  # code...
  foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($connect,$value); }
  $sql = "INSERT INTO tbl_kunjungan (id_kj, id_pasien, poli_tujuan, tgl_kj) VALUES ('{$_POST['fr_id_kunjungan']}','{$_POST['fr_id_pasien']}','{$_POST['fr_poli_tujuan']}','{$_POST['fr_tgl_kj']}')";
  $connect->query($sql);
  header('location:?page=kunjungan');
}

$query = "SELECT max(id_kj) as id from tbl_kunjungan";
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
$char = "K";
$id_kunjungan = $char . sprintf("%03s", $noUrut);

?>
          <h2>Input Data Pasien</h2> <hr> <br>
          <form action="" method="POST">
            <div class="form-group">
              <label>ID Kunjungan : </label>
              <input class="form-control" type="text" name="fr_id_kunjungan" value="<?php echo $id_kunjungan?>">
            </div>
            <div class="form-group">
              <label>ID Pasien : </label>
              <select class="form-control" name="fr_id_pasien">
                <option value="">Pilih Pasien</option>
                <?php
                  $sql = 'SELECT * FROM tbl_pasien';
                    $result = $connect->query($sql);
                    if ($result->num_rows > 0){
                      $i = 1;
                    while($row = $result->fetch_assoc()) {
                ?>
                <option value="<?=$row['id_pasien']?>">
                  <?=$row['id_pasien'].' - '.$row['nama_pasien']?>
                </option>
              <?php }} ?>
              </select>
            </div>

            <div class="form-group">
              <label>Poli Tujuan: </label>
              <input class="form-control" type="text" name="fr_poli_tujuan", value="">
            </div>
            <div class="form-group">
              <label>Tanggal Kunjungan : </label>
              <input class="form-control" type="date" name="fr_tgl_kj", value="">
            </div>
            <button class="btn btn-primary">Simpan</button>
            <input type="hidden" name="submitted">

          </form>
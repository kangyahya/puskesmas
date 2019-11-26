<?php
if (isset($_POST['submitted'])) {
  # code...
  foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($connect,$value); }
  $sql = "UPDATE tbl_kunjungan SET id_pasien = '{$_POST['fr_id_pasien']}', poli_tujuan = '{$_POST['fr_poli_tujuan']}', tgl_kj = '{$_POST['fr_tgl_kj']}' WHERE id_kj = '{$_POST['fr_id_kunjungan']}'";
  $connect->query($sql);
  header('location:?page=kunjungan');
}
$id = $_GET['id'];
$query = "SELECT * FROM tbl_kunjungan WHERE id_kj = '$id'";
$result = $connect->query($query);
$data = $result->fetch_array();

?>
          <h2>Update Data Kunjungan Pasien</h2> <hr> <br>
          <form action="" method="POST">
            <div class="form-group">
              <label>ID Kunjungan : </label>
              <input class="form-control" readonly type="text" name="fr_id_kunjungan" value="<?php echo $data['id_kj']?>">
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
                      $sqll = "SELECT * FROM tbl_kunjungan WHERE id_kj = '$id'";
                      $res = $connect->query($sqll);
                      $dat = $res->fetch_array();
                      if ($dat['id_pasien']==$row['id_pasien']) {
                        $selected = "selected";
                      }else{
                        $selected = "";
                      }
                ?>
                <option value="<?=$row['id_pasien']?>" <?=$selected?>>
                  <?=$row['id_pasien'].' - '.$row['nama_pasien']?>
                </option>
              <?php }} ?>
              </select>
            </div>

            <div class="form-group">
              <label>Poli Tujuan: </label>
              <input class="form-control" type="text" name="fr_poli_tujuan", value="<?=$data['poli_tujuan']?>">
            </div>
            <div class="form-group">
              <label>Tanggal Kunjungan : </label>
              <input class="form-control" type="date" name="fr_tgl_kj", value="<?=$data['tgl_kj']?>">
            </div>
            <button class="btn btn-primary">Update</button>
            <input type="hidden" name="submitted">

          </form>
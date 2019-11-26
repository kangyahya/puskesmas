            
            <?php
            if (isset($_POST['submitted'])) {
              # code...
              foreach($_POST AS $key => $value) { $_POST[$key] = mysqli_real_escape_string($connect,$value); }
              $sql = "UPDATE tbl_pasien SET nama_pasien = '{$_POST['fr_nama_pasien']}', tgl_lahir='{$_POST['fr_tgl_lahir']}', jk = '{$_POST['jk']}' , nama_kk = '{$_POST['fr_nama_kk']}', alamat='{$_POST['fr_alamat']}' WHERE id_pasien = '{$_POST['fr_id_pasien']}'";
              $connect->query($sql);
              header('location:?page=pasien');
            }
                $id_pasien = $_GET['id'];
                $sql = "SELECT * FROM tbl_pasien WHERE id_pasien = '$id_pasien'";
                $result = $connect->query($sql);
                $data = $result->fetch_assoc();
            ?>
            <h2>Edit Data Pasien</h2> <hr> <br>
            <form action="" method="POST">
              <div class="form-group">
                <label>ID Pasien : </label>
                <input class="form-control" type="text" readonly name="fr_id_pasien", value="<?php echo $data['id_pasien'];?>">
              </div>
              <div class="form-group">
                <label>Nama Pasien : </label>
                <input class="form-control" type="text" name="fr_nama_pasien", value="<?php echo $data['nama_pasien'];?>">
              </div>
              <div class="form-group">
                <label>Tanggal Lahir : </label>
                <input class="form-control" type="date" name="fr_tgl_lahir", value="<?php echo $data['tgl_lahir'];?>">
              </div>

              <div class="form-group">
                <label>Jenis Kelamin </label>
                <div class="form-check">
                  <?php
                  if ($data['jk']=='L') {
                    $l = "checked";
                    $p = "";
                  }else{
                    $l = "";
                    $p = "checked";
                  }
                  ?>
                  <input class="form-check-input" type="radio" name="jk" value="P" <?=$p?>>
                  <label class="form-check-label mr-5">
                    Perempuan
                  </label>
                   <input class="form-check-input" type="radio" name="jk" value="L" <?=$l?>>
                  <label class="form-check-label">
                    Laki-laki
                  </label>
                </div>
              </div>

              <div class="form-group">
                <label>Nama KK: </label>
                <input class="form-control" type="text" name="fr_nama_kk", value="<?php echo $data['nama_kk'];?>">
              </div>
              <div class="form-group">
                <label>Alamat : </label>
                <input class="form-control" type="text" name="fr_alamat", value="<?php echo $data['alamat'];?>">
              </div>
              <button class="btn btn-primary">Update</button>
              <input type="hidden" name="submitted">
            </form>
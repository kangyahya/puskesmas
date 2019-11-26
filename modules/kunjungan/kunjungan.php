        <h3>DATA KUNJUNGAN PASIEN</h3><hr>
        <a href="?page=kunjungan_tambah" class="btn btn-info  active my-2" role="button" aria-pressed="true">Tambah Data</a>
        
        <br><table class="table table-striped">
          <thead class="thead bg-green">
            <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">ID Kunjungan</th>
              <th scope="col">ID Pasien</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Poli Tujuan</th>
              <th scope="col">Tanggal Kunjungan</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
              <?php
                $sql = 'SELECT * FROM tbl_pasien, tbl_kunjungan WHERE tbl_pasien.id_pasien=tbl_kunjungan.id_pasien';
                $result = $connect->query($sql);
                if ($result->num_rows > 0){
                  $i = 1;
                  while($row = $result->fetch_assoc()) {
              ?>
            <tr class="text-center">
              <td><?php echo $i; ?></td>
              <td><?php echo $row['id_kj']; ?></td>
              <td><?php echo $row['id_pasien']; ?></td>
              <td><?php echo $row['nama_pasien']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['jk']; ?></td>
              <td><?php echo $row['poli_tujuan']; ?></td>
              <td><?php echo $row['tgl_kj']; ?></td>
              
              <td>
                <a class="btn btn-primary" href="?page=kunjungan_edit&id=<?=$row['id_kj'];?>">Edit</a>
                 <a class="btn btn-danger" href="?page=kunjungan_hapus&id=<?php echo $row['id_kj'];?>" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>

              </td>
            </tr>
            <?php
              $i++;
                }
              }else{ ?>
                <tr class="text-center">
                  <td colspan="9">Tidak Ada Data</td>
                </tr>
            <?php  }
            ?>
          </tbody>
        </table>
        
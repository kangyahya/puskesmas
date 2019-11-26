        <h3>DATA PASIEN</h3><hr>
        <a href="?page=pasien_tambah" class="btn btn-info  active my-2" role="button" aria-pressed="true">Tambah Data</a>
        
        <br><table class="table table-striped">
          <thead class="thead bg-green">
            <tr class="text-center">
              <th scope="col">No</th>
              <th scope="col">ID Pasien</th>
              <th scope="col">Nama Pasien</th>
              <th scope="col">Tanggal Lahir</th>
              <th scope="col">Jenis Kelamin</th>
              <th scope="col">Nama KK</th>
              <th scope="col">Alamat</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
              <?php
                $sql = 'SELECT * FROM tbl_pasien';
                $result = $connect->query($sql);
                if ($result->num_rows > 0){
                  $i = 1;
                  while($row = $result->fetch_assoc()) {
              ?>
            <tr class="text-center">
              <td><?php echo $i; ?></td>
              <td><?php echo $row['id_pasien']; ?></td>
              <td><?php echo $row['nama_pasien']; ?></td>
              <td><?php echo $row['tgl_lahir']; ?></td>
              <td><?php echo $row['jk']; ?></td>
              <td><?php echo $row['nama_kk']; ?></td>
              <td><?php echo $row['alamat']; ?></td>
              
              <td>
                <a class="btn btn-primary" href="?page=pasien_edit&id=<?=$row['id_pasien'];?>">Edit</a>
                 <a class="btn btn-danger" href="?page=pasien_hapus&id_pasien=<?php echo $row['id_pasien'];?>" onclick="return confirm('Yakin ingin dihapus ?')">Hapus</a>

              </td>
            </tr>
            <?php
              $i++;
                }
              }
            ?>
          </tbody>
        </table>
        
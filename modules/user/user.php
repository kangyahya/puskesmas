        <h3>Data User</h3><hr>
        <a href="?page=user_tambah" class="btn btn-info  active my-2" role="button" aria-pressed="true">Tambah User</a>
        <br><table class="table table-striped">
          <thead class="thead bg-green">
            <tr class="text-center">
              <th scope="col">Username</th>
              <th scope="col">Opsi</th>
            </tr>
          </thead>
          <tbody>
          	<?php
                $sql = 'SELECT * FROM tbl_user';
                $result = $connect->query($sql);
                if ($result->num_rows > 0){
                  $i = 1;
                  while($row = $result->fetch_assoc()) {
              ?>
          	<tr class="text-center">
          		<td><?=$row['username']?></td>
          		<td><a class="btn btn-primary" href="">Edit</a>
          			<a class="btn btn-danger" href="">Hapus</a>
          		</td>
          	</tr>
          <?php } } ?>
          </tbody>
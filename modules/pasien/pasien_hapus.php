            <?php
                $id_pasien = $_GET['id_pasien'];
                $sql = "DELETE FROM tbl_pasien WHERE id_pasien = '$id_pasien'";
                
                $result = $connect->query($sql);
                header("location:?page=pasien");
            ?>
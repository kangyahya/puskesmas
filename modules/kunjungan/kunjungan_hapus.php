            <?php

                $id_kunjungan = $_GET['id'];
                $sql = "DELETE FROM tbl_kunjungan WHERE id_kj = '$id_kunjungan'";
                $result = $connect->query($sql);
                header("location:?page=kunjungan");
            ?>
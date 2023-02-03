<?php
    include "../config.php";
    if($_POST['idx']) {
        $id = $_POST['idx'];      
        $sql = mysqli_query ($con, "SELECT * FROM users WHERE id_user = '$id' ");
        while ($row = mysqli_fetch_assoc($sql)){
		?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_user']; ?>">
            <div class="form-group">
                <label>Kode Registrasi</label>
                <input type="text" class="form-control" name="koreg" value="<?php echo $row['koreg']; ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" value="<?php echo $row['nama']; ?>">
            </div>
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $row['username']; ?>">
            </div>
            <?php 
            $kategori='';
            if ($row['akses']==2) {
                $kategori = 'Dosen';
            }elseif ($row['akses']==3) {
                $kategori='Mahasiswa';
            }elseif ($row['akses']==4) {
                $kategori='Karyawan';
            }
            ?>
            <div class="form-group">
                <label>Kategori</label>
                <select class="form-control" name="kategori">
                    <option value="<?php echo $row['akses']; ?>"> -- <?php echo $kategori; ?> -- </option>
                    <option value="2">Dosen</option>
                    <option value="3">Mahasiswa</option>
                    <option value="4">Karyawan</option>
                </select>
            </div>
              <button class="btn btn-primary" type="submit" name="update">Update</button>
        </form>     
        <?php } 
    }elseif ($_POST['dosen']) {
        $id=$_POST['dosen'];
        $tampil=mysqli_query($con, "SELECT * FROM dosen WHERE id_dosen='$id'");
        while ($row=mysqli_fetch_array($tampil)) {
            $nama=$row['id_user'];
            $pilih=mysqli_query($con, "SELECT * FROM users WHERE id_user='$nama' ");
            $row_pilih=mysqli_fetch_array($pilih);
            ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id_dosen']; ?>">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                <div class="form-group">
                    <label>NIDN</label>
                    <input type="text" class="form-control" name="nidn" value="<?php echo $row['nidn']; ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row_pilih['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Tetala</label>
                    <input type="text" class="form-control" name="ttl" value="<?php echo $row['ttl']; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan']; ?>">
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <input type="text" class="form-control" name="status" value="<?php echo $row['status']; ?>">
                </div>
                <button class="btn btn-primary" type="submit" name="update_dosen">Update</button>
            </form>
            <?php
        }
    }elseif ($_POST['mahasiswa']) {
       $id=$_POST['mahasiswa'];
       $mahasiswa=mysqli_query($con, "SELECT * FROM mahasiswa WHERE id_mahasiswa='$id'");
        while ($row=mysqli_fetch_array($mahasiswa)) {
            $nama=$row['id_user'];
            $pilih=mysqli_query($con, "SELECT * FROM users WHERE id_user='$nama' ");
            $row_pilih=mysqli_fetch_array($pilih);

            $fakultas=$row['fakultas'];
            $fak=mysqli_query($con, "SELECT * FROM fakultas WHERE id_fakultas='$fakultas' ");
            $row_fak=mysqli_fetch_array($fak);

            $prodi=$row['prodi'];
            $pro=mysqli_query($con, "SELECT * FROM prodi WHERE id_prodi='$prodi' ");
            $row_pro=mysqli_fetch_array($pro);
            ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id_mahasiswa']; ?>">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                <div class="form-group">
                    <label>NPM</label>
                    <input type="text" class="form-control" name="npm" value="<?php echo $row['npm']; ?>">
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row_pilih['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Tetala</label>
                    <input type="text" class="form-control" name="ttl" value="<?php echo $row['ttl']; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
                </div>
                 <div class="form-group">
                    <label>Fakultas</label>
                    <select class="form-control" id="fakultas" name="fakultas">
                         <option value="<?php echo $row_fak['id_fakultas']; ?>"> -- <?php echo $row_fak['fakultas']; ?> -- </option>
                        <?php
                        $fakultas2 = mysqli_query($con, "SELECT * FROM fakultas ORDER BY id_fakultas");
                        while($row2=mysqli_fetch_array($fakultas2))
                        {
                          echo "<option value='$row2[id_fakultas]'>$row2[fakultas]</option>\n";
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label>Prodi</label>
                    <select class="form-control" id="prodi" name="prodi">
                        <option value="<?php echo $row_pro['id_prodi']; ?>"> -- <?php echo $row_pro['prodi']; ?> -- </option>
                        <?php
                        $prodi2 = mysqli_query($con, "SELECT * FROM prodi ORDER BY id_prodi");
                        while($row2=mysqli_fetch_array($prodi2))
                        {
                          echo "<option value='$row2[id_prodi]'>$row2[prodi]</option>\n";
                        }
                        ?>
                    </select>
                </div>
                 <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" class="form-control" name="angkatan" value="<?php echo $row['angkatan']; ?>">
                </div>
                <button class="btn btn-primary" type="submit" name="update_mahasiswa">Update</button>
            </form>
            <?php
        }
    }elseif ($_POST['karyawan']) {
        $id=$_POST['karyawan'];
        $tampil=mysqli_query($con, "SELECT * FROM karyawan WHERE id_karyawan='$id'");
        while ($row=mysqli_fetch_array($tampil)) {
            $nama=$row['id_user'];
            $pilih=mysqli_query($con, "SELECT * FROM users WHERE id_user='$nama' ");
            $row_pilih=mysqli_fetch_array($pilih);
            ?>
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $row['id_karyawan']; ?>">
                <input type="hidden" name="id_user" value="<?php echo $row['id_user']; ?>">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?php echo $row_pilih['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Tetala</label>
                    <input type="text" class="form-control" name="ttl" value="<?php echo $row['ttl']; ?>">
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?php echo $row['alamat']; ?>">
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" class="form-control" name="jabatan" value="<?php echo $row['jabatan']; ?>">
                </div>
                <button class="btn btn-primary" type="submit" name="update_karyawan">Update</button>
            </form>
            <?php
        }
    }
?>
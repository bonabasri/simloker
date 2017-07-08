
<div class="row">
    <div class="col-lg-8">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Lengkapi profil perusahaan anda, sebelum posting lowongan pekerjaan <a href="#" class="alert-link"></a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $GetID  = $_SESSION['user_id'];
            $sql = "SELECT *FROM tb_perusahaan a
                    INNER JOIN tb_user b ON (a.user_id=b.user_id) 
                    WHERE a.user_id = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $sql = "SELECT * FROM tb_jenis_pekerjaan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $jenis_kerja .= "<option value='{$row['id_jenis']}'> {$row['nama_jenis_kerja']} </option>";
                }

            $sql = "SELECT * FROM tb_kategori_pekerjaan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $kategori_kerja .= "<option value='{$row['id_kategori_kerja']}'> {$row['nama_kategori_kerja']} </option>";
                }

            $sql = "SELECT * FROM tb_kategori_pendidikan";
            $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) {
                    $kategori_pendidikan .= "<option value='{$row['id_pendidikan']}'> {$row['nama_pendidikan']} </option>";
                }
        ?>    
                   
                <form class="form" role="form" action="?p=employer.action" id="defaultForm" method="post" enctype="multipart/form-data">
                
                <input type="hidden" name="user_id" value="<?php echo $GetID; ?>">         
                    <div class="form-group">
                    <label> Username</label>
                        <input type="text" class="form-control" name="user_id" value="<?php echo $data['user_id']; ?>" disabled/>
                    </div>
                    <div class="form-group">
                    <label> Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>" disabled/>
                    </div>
                    <div class="form-group">
                    <label> Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" value="<?php echo $data['nama_perusahaan']; ?>" required/>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kota" value="<?php echo $data['kota']; ?>" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="prov" value="<?php echo $data['prov']; ?>" required/>
                    </div>
                    <div class="form-group">
                    <label> Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" value="<?php echo $data['no_telp']; ?>" required/>
                    </div>
                    <div class="form-group">
                    <label> Logo Perusahaan</label>
                        <input type="file" name="logo"><img src="dist/images/logo/<?php echo $data['logo'];?>" width="90" height="90" required/>
                    </div>
                    <div class="form-group">
                    <label> Deskripsi Perusahaan</label>
                        <textarea id="editor" name="ket_perusahaan" required/><?php echo $data['ket_perusahaan'];?>
                        </textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=employer.view">Batal</a>
                        <button class="btn btn-primary" type="submit" name="edit">Ubah</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>


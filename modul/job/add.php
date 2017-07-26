
    <div class="row">
        <div class="col-lg-8">
            <h5 class="page-header"><small>Pasang Lowongan</small></h5>
    
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $Id     = "SELECT max(id_lowongan) AS data FROM tb_lowongan";
            $res    = $conn->query($Id);
            $row    = $res->fetch_assoc();
            $id     = $row['data']+1;

            $getID = $_SESSION['user_id'];
            $sql = "SELECT *FROM tb_lowongan a
                        LEFT JOIN tb_perusahaan b ON (a.user_id=b.user_id) 
                    WHERE b.user_id= '$getID'";
            $res = $conn->query($sql);
            foreach ($res as $row => $data);

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
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=job.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_lowongan" value="<?php echo $id; ?>">
                    <input type="hidden" name="nama_perusahaan" value="<?php echo $data['nama_perusahaan']; ?>">
                    <div class="form-group">
                    <label> Kategori Pekerjaan</label>
                        <select class="form-control" name="id_kategori_pekerjaan" required/>
                            <option value="">- Pilih -</option>
                            <?php echo $kategori_kerja; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Jenis Pekerjaan</label>
                        <select class="form-control" name="id_jenis" required/>
                            <option value="">- Pilih -</option>
                            <?php echo $jenis_kerja; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Posisi</label>
                        <input type="text" class="form-control" name="posisi" placeholder="Judul Pekerjaan" required/>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <select class="form-control" name="jk_require" required/>
                            <option value="">- Pilih -</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                            <option value="Pria & Wanita">Pria & Wanita</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Usia</label>
                        <input type="text" class="form-control" name="usia" placeholder="Usia" required/>
                    </div>
                    <div class="form-group">
                    <label> Lulusan</label>
                        <select class="form-control" name="id_pendidikan" required/>
                            <option value="">- Pilih -</option>
                            <?php echo $kategori_pendidikan; ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Pengalaman</label>
                        <input type="text" class="form-control" name="pengalaman" placeholder="Pengalaman" required/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Akhir Lowongan</label>
                            <input type="text" name="tgl_akhir" id="datepicker" class="form-control" placeholder="Tanggal Akhir" required/>
                    </div>
                    <div class="form-group">
                    <label> Keterangan Gambar</label>
                            <input type="file" name="img" required/><i style="color:red;">* 
                            File tipe .png, .jpg/jpeg</i>
                    </div>
                    <div class="form-group">
                    <label> Deskripsi Lowongan</label>
                        <textarea id="editor" name="deskripsi" required=""></textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=job.view">Batal</a>
                        <input type="submit" name="save" value="Terbitkan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>

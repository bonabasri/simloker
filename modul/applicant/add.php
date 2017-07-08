
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small> Profil Pelamar</small></h3>
        
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
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
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=applicant.action" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label> Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" placeholder="Nama Depan" required/>
                    </div>
                    <div class="form-group">
                    <label> Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" placeholder="Nama Belakang" required/>
                    </div>
                    <div class="form-group">
                    <label> Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir" required/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lahir" id="datepicker" placeholder="Tanggal Lahir" required/>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <select class="form-control" name="jk" required/>
                            <option value="">- Pilih -</option>
                            <option value="P">Pria</option>
                            <option value="W">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Agama</label>
                        <input type="text" class="form-control" name="agama" placeholder="Agama" required/>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required/>
                    </div>
                    <div class="form-group">
                    <label> Lulusan</label>
                        <input type="text" class="form-control" name="lulusan" placeholder="Lulusan" required/>
                    </div>
                    <div class="form-group">
                    <label> Usia</label>
                        <input type="text" class="form-control" name="usia" placeholder="Usia" required/>
                    </div>
                    <div class="form-group">
                    <label> Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" placeholder="Nomor Telepon" required/>
                    </div>
                    <div class="form-group">
                    <label> Pengalaman</label>
                        <input type="text" class="form-control" name="pengalaman" placeholder="Pengalaman" required/>
                    </div>
                    <div class="form-group">
                    <label> Tinggi Badan</label>
                        <input type="text" class="form-control" name="tinggi_badan" placeholder="Tinggi Badan" required/>
                    </div>
                    <div class="form-group">
                    <label> Foto</label>
                        <input type="file" name="foto" required/>
                    </div>
                    <div class="form-group">
                    <label> Kelebihan</label>
                        <textarea id="editor" name="kelebihan" required=""></textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="?p=applicant.view">Batal</a>
                        <input type="submit" name="save" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>

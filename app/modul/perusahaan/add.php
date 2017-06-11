
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> Profil Perusahaan</h3>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Perusahaan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                    
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
                   
                <form class="" role="form" style="margin-top: 10px;" action="?p=perusahaan.action" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label> Nama Perusahaan</label>
                        <input type="text" class="form-control" name="nama_perusahaan" placeholder="Nama Perusahaan" required/>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Alamat" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="kota" placeholder="Kota" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="prov" placeholder="Provinsi" required/>
                    </div>
                    <div class="form-group">
                    <label> Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_telp" placeholder="Nomor Telepon" required/>
                    </div>
                    <div class="form-group">
                    <label> Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                    <label> Logo Perusahaan</label>
                        <input type="file" name="logo" required/>
                    </div>
                    <div class="form-group">
                    <label> Deskripsi Perusahaan</label>
                        <!-- <div id="editor" name="ket_perusahaan">
                            
                        </div> -->
                        <textarea id="editor" name="ket_perusahaan">Tulis Disini</textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <!-- <input type="submit" name="save" value="Simpan" class="btn btn-primary"> -->
                        <button class="btn btn-primary" type="submit" name="save">Simpan</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>


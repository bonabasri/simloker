
    <div class="row">
    <div class="col-md-8">
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            Lengkapi profil data diri anda <a href="#" class="alert-link"></a>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">Informasi Pelamar</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
        <?php
            $GetID  = $_SESSION['user_id'];
            $sql = "SELECT *FROM tb_pelamar a
                    LEFT JOIN tb_user b ON (a.user_id=b.user_id)
                    LEFT JOIN tb_provinsi c ON (a.provinsi = c.id_provinsi)
                    LEFT JOIN tb_kota d ON (a.kota = d.id_kota)
                    WHERE a.user_id = '$GetID'";
            $res = $conn->query($sql);
            $data = $res->fetch_assoc();

            $query = $conn->query("SELECT * FROM tb_provinsi");
            $rowCount = $query->num_rows;

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
                   
                <form class="" role="form" style="margin: 10px 30px 20px 20px" action="?p=applicant.action" id="defaultForm" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="user_id" value="<?php echo $GetID; ?>">
                    <div class="form-group">
                    <label> Username</label>
                        <input type="text" class="form-control" name="user_id" value="<?php echo $data['user_id']; ?>" disabled/> <i>username tidak dapat diubah</i>
                    </div>
                    <div class="form-group">
                    <label> Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>"/>
                    </div>
                    <div class="form-group">
                    <label> Nama Depan</label>
                        <input type="text" class="form-control" name="nama_depan" value="<?php echo $data['nama_depan']; ?>" placeholder="Nama Depan" required/>
                    </div>
                    <div class="form-group">
                    <label> Nama Belakang</label>
                        <input type="text" class="form-control" name="nama_belakang" value="<?php echo $data['nama_belakang']; ?>" placeholder="Nama Belakang" required/>
                    </div>
                    <div class="form-group">
                    <label> Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" value="<?php echo $data['tempat_lahir']; ?>" placeholder="Tempat Lahir" required/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Lahir</label>
                        <input type="text" class="form-control" name="tgl_lahir" id="datepicker" value="<?php echo date_format(date_create($data['tgl_lahir']), 'd/m/Y'); ?>" placeholder="Tanggal Lahir" required/>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <select class="form-control" name="jk" required/>
                            <option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                    </div>

                    <div class="form-group">
                    <label> Agama</label>
                        <select class="form-control" name="agama" value="<?php echo $data['agama'];?>" required/>
                            <option value="<?php echo $data['agama'];?>"><?php echo $data['agama'];?></option>
                            <option value="Islam">Islam</option>
                            <option value="Kristen">Kristen</option>
                            <option value="Katolik">Katolik</option>
                            <option value="Hindu">Hindu</option>
                            <option value="Budha">Budha</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Provinsi</label>
                        <select class="form-control" name="provinsi" id="provinsi" required/>
                            <option value="<?php echo $data['provinsi']; ?>"><?php echo $data['provinsi']; ?></option>
                            <?php
                                if($rowCount > 0){
                                    while($row = $query->fetch_assoc()){ 
                                        echo '<option value="'.$row['id_provinsi'].'">'.$row['provinsi'].'</option>';
                                    }
                                }else{
                                    echo '<option value="">Provinsi Tidak Tersedia</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Kota</label>
                        <select class="form-control" name="kota" id="kota" required/>
                            <option value="<?php echo $data['kota']; ?>"><?php echo $data['kota']; ?></option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?php echo $data['alamat']; ?>" placeholder="Alamat" required/>
                    </div>
                    <div class="form-group">
                    <label> Lulusan</label>
                        <select class="form-control" name="lulusan" value="<?php echo $data['lulusan'];?>" required/>
                            <option value="<?php echo $data['lulusan'];?>"><?php echo $data['lulusan'];?></option>
                            <option value="SD">SD</option>
                            <option value="SMP">SMP</option>
                            <option value="SMA">SMA</option>
                            <option value="SMK">SMK</option>
                            <option value="D1">D1</option>
                            <option value="D2">D2</option>
                            <option value="D3">D3</option>
                            <option value="D4">D4</option>
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>
                    <div class="form-group">
                    <label> Usia</label>
                        <input type="text" class="form-control" name="usia" id="umur" value="<?php echo $data['usia']; ?>" placeholder="Usia" required/>
                    </div>
                    <div class="form-group">
                    <label> Nomor Telepon</label>
                        <input type="text" class="form-control" name="no_hp" value="<?php echo $data['no_hp']; ?>" placeholder="Nomor Telepon" required/>
                    </div>
                    <div class="form-group">
                    <label> Pengalaman</label>
                        <input type="text" class="form-control" name="pengalaman" value="<?php echo $data['pengalaman']; ?>" placeholder="Pengalaman" required/>
                    </div>
                    <div class="form-group">
                    <label> Tinggi Badan</label>
                        <input type="text" class="form-control" name="tinggi_badan" value="<?php echo $data['tinggi_badan']; ?>" name="Tinggi Badan" required/>
                    </div>
                    <div class="form-group">
                    <label> Foto</label>
                        <input type="file" name="foto"/><img src="dist/images/foto/<?php echo $data['foto'];?>" width="90" height="90" required/>
                    </div>
                    <div class="form-group">
                    <label> Kelebihan</label>
                        <textarea id="editor" name="kelebihan" required/><?php echo $data['kelebihan']; ?></textarea>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <a class="btn btn-default" href="#">Batal</a>
                        <button class="btn btn-primary" type="submit" name="edit">Ubah</button>
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>
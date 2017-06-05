
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
                   
                <form class="" role="form" style="margin-top: 10px;" action="?ref=save" id="defaultForm" method="post" enctype="multipart/form-data">              
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
                        <div id="editor">
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <input type="submit" name="save" value="Simpan" class="btn btn-primary">
                    </div>                   
                </form>
            </div>
        </div>
    </div>
</div>
</div>


<script>
// DATEPICKER
$(document).ready(function() {
    $('#tgl').datepicker({
        //dateFormat: "dd/MM/yy",
        //autoclose:true
        changeMonth: true,
        yearRange: "-30:+0",
        format: "dd-mm-yyyy",
        changeYear: true
        });
    });
    
    // initSample();
    CKEDITOR.replace( 'editor' );
</script>

<script>
/* FORMAT ANGKA 2 TITIK BELAKANG KOMA */
function angka(objek) {
    objek = typeof(objek) != 'undefined' ? objek : 0;
    a = objek.value;
    b = a.replace(/[^\d]/g,"");
    c = "";
    panjang = b.length;
    j = 0;
    for (i = panjang; i > 0; i--) {
    j = j + 1;
    if (((j % 2) == 1) && (j != 1)) {
    c = b.substr(i-1,1) + "." + c;
    } else {
    c = b.substr(i-1,1) + c;
    }
}
/* AUTOSUM */
    objek.value = c;
    var bin=document.getElementById('bin').value;
    var big=document.getElementById('big').value;
    var mat=document.getElementById('mat').value;
    var ipa=document.getElementById('ipa').value;
            
    var jmlnilai = (parseFloat(bin) + parseFloat(big) + parseFloat(mat) + parseFloat(ipa));
    var h = jmlnilai.toFixed(2);
    document.getElementById("jmlnilai").value = h;
}
</script>

<script>
/* VALIDASI INPUTAN ANGKA */
function number(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
    return true;
}
</script>

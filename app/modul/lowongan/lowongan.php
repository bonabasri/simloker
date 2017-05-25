
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> Pasang Lowongan</h3>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">Informasi Lowongan</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                    
    
                   
                <form class="form-horizontal" style="margin-top: 10px;" action="?ref=formulirs" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Judul</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Posisi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Pendidikan</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Umur</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Tanggal Akhir Lowo</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Tempat, Tanggal Lahir</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" name="tmp_lhr" placeholder="Tempat Lahir" required/>
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="tgl" id="tgl" class="form-control" placeholder="Tanggal Lahir" required/> <a style="color:#777; text-decoration:none;"> Ex: 13-07-2000</a>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Jenis Kelamin</label>
                        <div class="col-sm-4">
                            <select class="form-control" name="jk" required/>
                            <option value="">- Pilih -</option>
                            <option value="L">Laki-Laki</option>
                            <option value="P">Perempuan</option>
                            </select>      
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Asal Sekolah</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="as_sklh" placeholder="Asal Sekolah" required/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Nama Orang Tua</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="ortu" placeholder="Nama Ayah" required/>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Alamat Rumah</label>
                        <div class="col-sm-8"></div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> RT</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="rt" maxlength="2" onkeypress="return number(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> RW</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="rw" maxlength="2" onkeypress="return number(event)" required/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Desa, Kecamatan</label>
                        <div class="col-sm-8">
                            <textarea name="alamat" class="form-control" rows="2" placeholder="Alamat Lengkap" required/></textarea>
                        </div>
                    </div><br/>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> Nomor HP</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" pattern="[0-9]{12,12}" name="no_hp" onkeypress="return number(event)" placeholder="No HP" maxlength="12" required/>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-9">
                        <label class="checkbox-inline">
                            <input type="checkbox" name="agree" onclick="daftar.disabled=false;">&nbsp; Saya setuju untuk mendaftar.</label>
                        </div>
                    </div>
                    <div class="form-group">
                    <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input type="submit" name="daftar" value="DAFTAR" class="btn btn-primary" align="left" disabled/>
                        </div>
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

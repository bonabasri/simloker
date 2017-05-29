
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
                        <div class="col-lg-10">
                    
    
                   
                <form class="" role="form" style="margin-top: 10px;" action="?ref=formulirs" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label> Judul</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Posisi</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Pendidikan Terakhir</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Gaji</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Kategori</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Tanggal Akhir Lowongan</label>
                            <input type="text" name="tgl" id="tgl" class="form-control" placeholder="Tanggal Lahir" required/> <a style="color:#777; text-decoration:none;"> Ex: 13-07-2000</a>
                    </div><!-- 
                    <div class="form-group">
                    <label class="col-sm-3 control-label"> HAHAH</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="as_sklh" placeholder="Asal Sekolah" required/>
                        </div>
                    </div> -->
                    <div class="form-group">
                    <label> Keterangan Lowongan</label>
                        <div id="editor">
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <label></label>
                        <input type="submit" name="daftar" value="Terbitkan" class="btn btn-primary"disabled/>
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
    
    initSample();
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

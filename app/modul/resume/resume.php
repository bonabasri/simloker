
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header"> Add New Post</h3>
        </div>
    </div>
    <div class="row"> 
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">Deskripsi Resume</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-10">
                    
    
                   
                <form class="" role="form" style="margin-top: 10px;" action="?ref=formulirs" id="defaultForm" method="post" enctype="multipart/form-data">              
                    <div class="form-group">
                    <label> Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Jenis Kelamin</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Email</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> No. Handphone</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Alamat</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                    <label> Riwayat Pendidikan</label>
                        <div id="editor">
                            <h1>Hello world!</h1>
                            <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
                            
                        </div>
                    </div>
                    <div class="form-group">
                    <label> Riwayat Pekerjaan</label>
                        <div id="editor">
                            <h1>Hello world!</h1>
                            <p>I'm an instance of <a href="http://ckeditor.com">CKEditor</a>.</p>
                            
                        </div>
                    </div>
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

<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

?>

<div class="row"> 
    <div class="col-lg-12">
        <h3 class="page-header"> Edit Profil User</h3>
    </div>
</div>

<?php
 
    $get_id = $_GET['id'];
    $sql    = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_id='$get_id'");
    $data   = mysqli_fetch_assoc($sql);

    // UPDATE
    if (isset($_POST['update'])){
    $id           = $_POST['id'];
    $usr_username = $_POST['usr_username'];
    //$usr_password = $_POST['usr_password'];
    $usr_nama     = $_POST['usr_nama'];
    $usr_nip      = $_POST['usr_nip'];
    $usr_jk       = $_POST['usr_jk'];
    $usr_alamat   = $_POST['usr_alamat'];
    $usr_no_telp  = $_POST['usr_no_telp'];
    //$usr_blokir   = $_POST['usr_blokir'];

    //if (empty($_POST['usr_password'])) {
    mysqli_query($conn, "UPDATE tb_user SET usr_username = '$usr_username',
                                            usr_nama     = '$usr_nama',
                                            usr_nip      = '$usr_nip',
                                            usr_jk       = '$usr_jk',
                                            usr_alamat   = '$usr_alamat',
                                            usr_no_telp  = '$usr_no_telp'
                                      WHERE usr_id       = '$id'");
    //}
    echo "<div class='alert alert-success alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    Data User Berhasil Diubah. <a class='alert-link' href='?p=users.akun'> Back</a></div>";
    }
    // TAMPIL SAKBARE NGAPDEATH
    $sql  = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_id = '$get_id'");
    $data = mysqli_fetch_assoc($sql);
?>

<div class="row"> 
    <div class="col-lg-12">    
        <div class="panel panel-primary">
            <div class="panel-heading"></div> 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">                       
                        <form id="defaultForm" method="post" action="" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $get_id; ?>">
                                          
                            <div class="form-group">
                            <label>Username</label>
                                <input type="text" name="usr_username" class="form-control" value="<?php echo $data['usr_username']; ?>" />
                            </div>
                            <div class="form-group">
                            <label>Nama Lengkap</label>
                                <input type="text" name="usr_nama" class="form-control" value="<?php echo $data['usr_nama']; ?>" />
                            </div>
                            <div class="form-group">
                            <label>NIP</label>
                                <input type="text" name="usr_nip" class="form-control" value="<?php echo $data['usr_nip']; ?>" maxlength="15" />
                            </div>
                            <div class="form-group">
                            <label>Jenis Kelamin</label>
                                <select name="usr_jk" class="form-control" />
                                    <option value="<?php echo $data['usr_jk'];?>" ><?php echo $data['usr_jk'];?></option>
                                    <option value="L">L</option>
                                    <option value="P">P</option>
                                </select>
                            </div>
                            <div class="form-group">
                            <label>Alamat</label>
                                <input type="text" name="usr_alamat" class="form-control" value="<?php echo $data['usr_alamat']; ?>" />
                            </div>
                            <div class="form-group">
                            <label>No. Telepon</label>
                                <input type="text" name="usr_no_telp" class="form-control" value="<?php echo $data['usr_no_telp']; ?>" onkeypress="return number(event)" pattern="[0-9]{12,12}" maxlength="12" />
                            </div>
                            <br/>                       
                            <button type="submit" name="update" class="btn btn-primary"> Save</button>
                            <a href="?p=users.akun" class="btn btn-default"> Cancel</a>
                            <a href="?p=users.password"> Ganti Password? </a>                     
                        </form>                
                    </div>                          
                </div>
            </div>
        </div>
    </div>
</div>

<script>
/* VALIDASI INPUTAN ANGKA */
function number(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
 
        return false;
    return true;
}
</script>
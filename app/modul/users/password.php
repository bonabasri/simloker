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
        <h3 class="page-header">Ganti Password</h3>
    </div>
</div>

<?php

if (isset($_POST['ubah'])) {

    $passwordLama = $_POST['passwordlama'];
    $passwordBaru = $_POST['passwordbaru'];
    $passwordKonf = $_POST['passwordkonfirm'];

    $usr_Id       = $_SESSION['usr_id'];
    $usr_password = sha1($passwordLama);

    $query = mysqli_query ($conn, "SELECT * FROM tb_user WHERE usr_id = '{$usr_Id}' AND usr_password = '{$usr_password}'");

    $res = mysqli_num_rows($query);

    if (!$res >= 1) {

        echo ("<script> sweetAlert('Whoops!', 'Password lama tidak sesuai, silahkan cek ulang!', 'error'); </script>");
    } 
    else if ($passwordBaru !== $passwordKonf) {

        echo ("<script> sweetAlert('Whoops!', 'Password baru dan password konfirmasi tidak sama, silahkan cek ulang!', 'error'); </script>");
    }
    else {
        $newPassword = sha1($passwordKonf);

        $update = mysqli_query($conn, "UPDATE tb_user SET usr_password = '{$newPassword}' WHERE usr_id = '{$usr_Id}'");

        if ($update) {

            echo("<script> swal('Success!', 'Password berhasil diganti, silahkan login kembali', 'success'); </script>");          
            }
        }   
    }
?>

<div class="row"> 
    <div class="col-lg-12">    
        <div class="panel panel-primary">
            <div class="panel-heading"></div> 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">                       
                        <form id="defaultForm" method="post" action="" enctype="multipart/form-data">                                      
                            <div class="form-group">
                            <label>Password Lama</label>
                                <input type="password" name="passwordlama" class="form-control" maxlength="32" required />
                            </div>
                            <div class="form-group">
                            <label>Password Baru</label>
                                <input type="password" name="passwordbaru" class="form-control" maxlength="32" required />
                            </div>
                            <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                                <input type="password" name="passwordkonfirm" class="form-control" maxlength="32" required />
                            </div>
                            
                            <br/>                       
                            <button type="submit" name="ubah" class="btn btn-primary"> Save</button>
                            <a href="?p=users.profile&id=<?php echo $_SESSION['usr_id']; ?>" class="btn btn-default"> Cancel</a>
                        </form>                
                    </div>                          
                </div>
            </div>
        </div>
    </div>
</div>
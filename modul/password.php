
<?php

if (isset($_POST['ubah'])) {

    $passwordLama = $_POST['passwordold'];
    $passwordBaru = $_POST['passwordnew'];
    $passwordKonf = $_POST['passwordconf'];

    $user_id      = $_SESSION['user_id'];
    $upsw         = sha1($passwordLama);

    $sql = "SELECT * FROM tb_user WHERE user_id = '{$user_id}' AND upsw = '{$upsw}'";
    $res = $conn->query($sql);

    if (!$res->num_rows >= 1) {

        echo ("<script> alert('Oops!, Password lama tidak sesuai, silahkan cek ulang!', 'error'); </script>");
        // echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
    
    } else if ($passwordBaru !== $passwordKonf) {

        echo ("<script> alert('Whoops!, Password baru dan password konfirmasi tidak sama, silahkan cek ulang!'); </script>");
    } else {
        
        $newPassword = sha1($passwordKonf);

        $update = "UPDATE tb_user SET upsw = '{$newPassword}' WHERE user_id = '{$user_id}'";

        if ($conn->query($update) === TRUE) {

            echo("<script> alert('Success!, Password berhasil diganti, silahkan login kembali'); </script>");
            echo '<meta http-equiv="refresh" content="0;URL=./logout.php">';        
            }
        } 
    }
?>

    <div class="row"> 
    <div class="col-lg-8">
        <h3 class="page-header"><small>Ganti Password</small></h3>

        <div class="panel panel-default">
            <div class="panel-heading"></div> 
            <div class="panel-body">
                <div class="row">
                    <div class="col-lg-10">                       
                        <form id="defaultForm" method="post" action="" enctype="multipart/form-data">                                      
                            <div class="form-group">
                            <label>Password Lama</label>
                                <input type="password" name="passwordold" class="form-control" maxlength="32" required />
                            </div>
                            <div class="form-group">
                            <label>Password Baru</label>
                                <input type="password" name="passwordnew" class="form-control" maxlength="32" required />
                            </div>
                            <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                                <input type="password" name="passwordconf" class="form-control" maxlength="32" required />
                            </div>
                            
                            <br/>                       
                            <button type="submit" name="ubah" class="btn btn-primary"> Save</button>
                            <button class="btn btn-white" type="reset">Reset</button>
                        </form>                
                    </div>                          
                </div>
            </div>
        </div>
    </div>
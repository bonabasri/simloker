<?php
if (isset($_POST['apply-save'])) 
{
	$v_id_lowongan 	= $_POST['id_lowongan'];
	$v_user_id 		= $_SESSION['user_id'];
	$email 			= $_SESSION['email'];
	$pass 			= $_SESSION['upsw'];

	$allowExt 			= array( 'doc', 'docx', 'pdf' );
	$allowExt1 			= array( 'pdf' );

	$fileName 			= $_FILES['file']['name'];
	$fileExt			= strtolower(end(explode('.', $fileName)));
	$fileSize			= $_FILES['file']['size'];
	$fileTemp 			= $_FILES['file']['tmp_name'];

	$fileName1 			= $_FILES['files']['name'];
	$fileExt1			= strtolower(end(explode('.', $fileName1)));
	$fileSize1			= $_FILES['files']['size'];
	$fileTemp1 			= $_FILES['files']['tmp_name'];

	$upload_dir 		= "dist/file/cv/";
	$file 				= basename ($fileName);
	$v_file 			= str_replace(' ','_',$file);

	$upload_dir1 		= "dist/file/ijazah/";
	$files 				= basename ($fileName1);
	$v_files 			= str_replace(' ','_',$files);

	if ( in_array( $fileExt, $allowExt ) === TRUE ) 
	{
		if ( in_array( $fileExt1, $allowExt1 ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( $fileSize1 < 1044070 ) 
				{
					$sqlcek = "SELECT * FROM tb_lamaran WHERE id_lowongan = '".$v_id_lowongan."' AND user_id = '".$v_user_id."' ";
		    		$result = $conn->query($sqlcek);

				    if ($result->num_rows > 0) {
				        echo '<script>alert("anda sudah mengirim lamaran"); </script>';
				        echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				    } else {

						if ( move_uploaded_file( $fileTemp,$upload_dir.$v_file ) && move_uploaded_file( $fileTemp1,$upload_dir1.$v_files ) )
						{
						$sql = "INSERT INTO tb_lamaran 
										(id_lowongan,user_id,file,files,tgl_lamar)
								VALUES ('$v_id_lowongan','$v_user_id','$v_file','$v_files',NOW())";

							if ( $conn->query($sql) === TRUE ) {
								echo '<script>alert("Lamaran berhasil dikirim, Thank You!"); </script>';
					 			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
					 			date_default_timezone_set('Etc/UTC');
								require 'PHPMailer/PHPMailerAutoload.php';
								$mail = new PHPMailer;
								$mail->isSMTP();
								$mail->Host = 'smtp.gmail.com';
								$mail->Port = 587;
								$mail->SMTPSecure = 'tls';
								$mail->SMTPAuth = true;
								$mail->Username = $email;
								$mail->Password = $pass;  /*Tulis Password Gmail Anda Disini*/
								$mail->setFrom('admin.lokercilacap@gmail.com', 'lokercilacap.com');
								$mail->addAddress($email, $v_user_id);
								$mail->Subject = 'Pemberitahuan dari lokercilacap.com';
								$mail->msgHTML("<body style='margin: 20px;'>
								        <div style='width: 640px; font-family: Arial, sans-serif; font-size: 14px; padding:30px 30px 30px 30px; line-height:25px; border:#eaeaea solid 10px; border-radius: 5px; color:#445566;'>
								        <br>
								        Pemberitahuan dari lokercilacap!<br>
								        Halloo <b>".$v_user_id."<br>, <br>
							        	Anda baru saja mengirim lamaran di lokercilacap!<br>
							        	Lowongan Anda berhasil dikirim.
								        Nantikan informasi selanjutnya
								        <hr>
								        Terima Kasih atas partisipasinya. Salam Hangat, <br>
								        </div>
								        </body>");
								$mail->AltBody = 'Selamat Datang di lokercilacap.com';

								if (!$mail->send()) {
								    echo "Mailer Error: " . $mail->ErrorInfo;
								}
							} else {
							// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
							echo '<script>alert("data gagal disimpan disimpan"); </script>';
					 		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
							}
						} else {
							echo '<script>alert("gagal upload file"); </script>';
							echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
						}
					}
				} else {
					echo '<script>alert("ukuran file ijazah maks 1 mb"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
				}
			} else {
				echo '<script>alert("ukuran file cv maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
			}
		} else {
			echo '<script>alert("ekstensi file ijazah harus pdf"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
		}
	} else {
		echo '<script>alert("ekstensi file cv tidak diijinkan"); </script>';
		echo '<meta http-equiv="refresh" content="0;URL=?p=home">';
	}
	$conn->close();
}
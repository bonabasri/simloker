<?php
	if (isset($_POST['update'])) 
	{
		// $getID 			 = $_GET['id'];
		$v_id_pelamar 	 = $_POST['id_lamaran'];
		$v_message 	  	 = $_POST['message'];
		$v_status 	  	 = $_POST['status'];
		$uname 			 = $_POST['uname'];
		$email 			 = $_POST['email'];
		$pass 			 = $_POST['upsw'];
		$nama_perusahaan = $_POST['nama_perusahaan'];
		$posisi 		 = $_POST['posisi'];
		$date	         = explode('/',$_POST['tgl_interview']);
		$v_tgl_interview = $date['2'].'-'.$date['1'].'-'.$date['0'];

		if ($v_status === '0') {
            $status = '<span class="label label-default">Pelamar Baru</span>';
        } elseif ($v_status === '1') {
        	$status = '<span class="label label-primary">Proses Interview</span>';
        } elseif ($v_status === '2') {
            $status = '<span class="label label-success">Diterima</span>';
        } elseif ($v_status === '3') {
        	$status = '<span class="label label-danger">Tidak Diterima</span>';
        } elseif ($v_status === '4') {
            $status = '<span class="label label-warning">Kurang Persyaratan</span>';
        }

		$sql = "UPDATE tb_lamaran SET 
					message = '$v_message',
					status  = '$v_status',
					tgl_interview = '$v_tgl_interview'
				WHERE id_lamaran = '$v_id_pelamar' ";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("Data lamaran berhasil diproses"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=recruit.view">';
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
			$mail->addAddress($email, $uname);
			$mail->Subject = 'Pemberitahuan dari lokercilacap.com';
			$mail->msgHTML("<body style='margin: 20px;'>
						<div style='width: 640px; font-family: Arial, sans-serif; font-size: 14px; padding:30px 30px 30px 30px; line-height:25px; border:#eaeaea solid 10px; border-radius: 5px; color:#445566;'>
						<br>
						Pemberitahuan dari lokercilacap!<br>
						Halloo <b>".$uname."</b>, <br>
						Anda telah melamar di <b>".$nama_perusahaan."</b> sebagai <b>".$posisi."</b>
						<br>
						Lowongan Anda <b>".$status."</b> <br>
						Message : ".$v_message." <br> 
						Date : ".$_POST['tgl_interview']." <br>
						
						<hr>
						Terima Kasih atas partisipasinya. Salam Hangat, <br>
						</div>
					</body>");
					$mail->AltBody = 'Pemberitahuan dari lokercilacap.com';

			if (!$mail->send()) {
				echo "Mailer Error: " . $mail->ErrorInfo;
			}
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		
	}
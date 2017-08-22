<?php
	
	if ( isset($_POST['save']) ) 
	{
		$v_user_id 					= $_SESSION['user_id'];
		$email						= $_SESSION['email'];
		$pass 						= $_SESSION['upsw'];
		$id 						= $_POST['id_lowongan'];
		$nama_perusahaan 			= $_POST['nama_perusahaan'];
		$alamat 					= $_POST['alamat'];
		$no_telp 					= $_POST['no_telp'];
		$tgl_posting 				= $_POST['tgl_posting'];
		$v_id_kategori_pekerjaan 	= $_POST['id_kategori_pekerjaan'];
		$v_id_jenis_kerja			= $_POST['id_jenis'];
		$v_posisi 					= $_POST['posisi'];
		$v_jk_require 				= $_POST['jk_require'];
		$v_usia 					= $_POST['usia'];
		$v_id_pendidikan			= $_POST['id_pendidikan'];
		$v_pengalaman				= $_POST['pengalaman'];

		$date 	        			= explode('-',$_POST['tgl_akhir']);
		$v_tgl_akhir 				= $date['2'].'-'.$date['1'].'-'.$date['0'];

		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['img']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['img']['size'];
		$fileTemp 			= $_FILES['img']['tmp_name'];

		$upload_dir 		= "dist/images/img/";
		$img 				= basename ($fileName);
		$v_img 				= str_replace(' ','_',$img);

		$v_deskripsi				= $_POST['deskripsi'];

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_img) ) 
				{
					$sql = "INSERT INTO tb_lowongan (
										user_id,
										id_kategori_pekerjaan,
										id_jenis,
										posisi,
										jk_require,
										usia,
										id_pendidikan,
										pengalaman,
										tgl_posting,
										tgl_akhir,
										img,
										deskripsi
										) VALUES (
												'$v_user_id',
												'$v_id_kategori_pekerjaan',
												'$v_id_jenis_kerja',
												'$v_posisi',
												'$v_jk_require',
												'$v_usia',
												'$v_id_pendidikan',
												'$v_pengalaman',
												NOW(),
												'$v_tgl_akhir',
												'$v_img',
												'$v_deskripsi' ) ";
					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("Lowongan berhasil disimpan, Silahkan cek email untuk konfirmasi"); </script>';
			 			echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';

			 			date_default_timezone_set('Etc/UTC');
						require 'PHPMailer/PHPMailerAutoload.php';
						$mail = new PHPMailer;
						$mail->isSMTP();
						// $mail->SMTPDebug = 2;
						// $mail->Debugoutput = 'html';
						$mail->Host = 'smtp.gmail.com';
						$mail->Port = 587;
						$mail->SMTPSecure = 'tls';
						$mail->SMTPAuth = true;
						$mail->Username = $email;
						$mail->Password = $pass;  /*Tulis Password Gmail Anda Disini*/
						$mail->setFrom('admin.lokercilacap@gmail.com', 'lokercilacap.com');
						$mail->addAddress($email, $v_user_id);
						$mail->Subject = 'Selamat Datang di lokercilacap.com';
						$mail->msgHTML("<body style='margin: 20px;'>
						        <div style='width: 640px; font-family: Arial, sans-serif; font-size: 14px; padding:30px 30px 30px 30px; line-height:25px; border:#eaeaea solid 10px; border-radius: 5px; color:#445566;'>
						        <br>
						        Hallo ".$v_user_id.", <br>
						        Terima Kasih Telah Memasang Lowongan di lokercilacap<br>
						        <p> Detail </p>
						        <ul>
							        <li>Nama Perusahaan : ".$nama_perusahaan." </li>
							        <li>Judul Lowongan : ".$v_posisi." </li>
							        <li>Nomor Telepon : ".$no_telp." </li>
							        <li>Alamat : ".$alamat." </li>
						        </ul>
						        <p> Nomor Rekening </p>
						        <ul>
						        	<li>BNI = 0242142155 </li>
									<li>BCA = 846111891</li>
									<li>Mandiri = 7106486608</li>
									Atas Nama Nasithotul Amaliya
						        </ul>
						        Selanjutnya untuk mengaktifkan iklan anda, <br> 
						        Klik link
						        <a class='btn btn-primary' href='http://localhost/simloker/main.php?p=job.confirm&id=".$id."'>VISIT PAGE</a><br>
						        Untuk batas waktu pembayaran iklan selama 2x24 jam.<br>
						        Selamat berkreasi dengan lokercilacap!
						        <hr>
						        Salam Hangat, <br>
						        Admin lokercilacap
						        </div>
						        </body>");
						$mail->AltBody = 'Selamat Datang di lokercilacap.com';

						if (!$mail->send()) {
						    echo "Mailer Error: " . $mail->ErrorInfo;
						}

					} else {
					// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					echo '<script>alert("data gagal dipublis"); </script>';
			 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=job.add">';
		}
		$conn->close();
	}


	if ( isset($_POST['edit']) ) 
	{
		$getId		= $_REQUEST['id'];
		// $v_user_id	= $_POST['user_id'];
		$cek 	  	= "SELECT * FROM tb_lowongan WHERE id_lowongan = '".$getId."' "; 
		$res    	= $conn->query($cek);
		$data   	= $res->fetch_array();

		// $v_id_perusahaan 			= $_SESSION['id_user'];
		$v_id_lowongan 				= $_POST['id_lowongan'];
		$v_id_kategori_pekerjaan 	= $_POST['id_kategori_pekerjaan'];
		$v_id_jenis_kerja			= $_POST['id_jenis'];
		$v_posisi 					= $_POST['posisi'];
		$v_jk_require 				= $_POST['jk_require'];
		$v_usia 					= $_POST['usia'];
		$v_id_pendidikan			= $_POST['id_pendidikan'];
		$v_pengalaman				= $_POST['pengalaman'];

		$date 	        			= explode('-',$_POST['tgl_akhir']);
		$v_tgl_akhir 				= $date['2'].'-'.$date['1'].'-'.$date['0'];

		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['img']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['img']['size'];
		$fileTemp 			= $_FILES['img']['tmp_name'];

		$upload_dir 		= "dist/images/img/";
		$img 				= basename ($fileName);
		$v_img 				= str_replace(' ','_',$img);

		$v_deskripsi				= $_POST['deskripsi'];

		/*jika foto tidak diubah*/
		if ( empty($fileTemp) ) 
		{
			$sql = "UPDATE tb_lowongan
							SET 
								id_kategori_pekerjaan 	= '$v_id_kategori_pekerjaan',
								id_jenis 				= '$v_id_jenis_kerja',
								posisi 					= '$v_posisi',
								jk_require 				= '$v_jk_require',
								usia 					= '$v_usia',
								id_pendidikan 			= '$v_id_pendidikan',
								pengalaman 				= '$v_pengalaman',
								tgl_akhir 				= '$v_tgl_akhir',
								deskripsi 				= '$v_deskripsi'
							WHERE id_lowongan 			= '".$getId."' ";

			if ( $conn->query($sql) === TRUE ) {
				echo '<script>alert("data lowongan berhasil diupdate"); </script>';
		 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			} else {
				// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
				echo '<script>alert("data lowongan gagal diupdate"); </script>';
		 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		}
		// jika foto diubah
		else if( !empty($fileTemp) ) 
		{

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_img) ) 
				{
					unlink($upload_dir.$data['img']);

					$sql = "UPDATE tb_lowongan
							SET 
								id_kategori_pekerjaan 	= '$v_id_kategori_pekerjaan',
								id_jenis 				= '$v_id_jenis_kerja',
								posisi 					= '$v_posisi',
								jk_require 				= '$v_jk_require',
								usia 					= '$v_usia',
								id_pendidikan 			= '$v_id_pendidikan',
								pengalaman 				= '$v_pengalaman',
								tgl_akhir 				= '$v_tgl_akhir',
								img 					= '$v_img',
								deskripsi 				= '$v_deskripsi'
							WHERE id_lowongan 			= '".$getId."' ";

					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("data lowongan berhasil diupdate"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					} else {
						// echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
						echo '<script>alert("data lowongan gagal diupdate"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		}
		$conn->close();
	}


	/* update iklan */

	if (isset($_POST['update'])) 
	{
		// $getId			= $_REQUEST['id'];
		$v_id_lowongan 	= $_POST['id_lowongan'];
		$v_status		= $_POST['stat'];

		$sql = "UPDATE tb_lowongan SET
					stat = 2
				WHERE id_lowongan = '$v_id_lowongan'";

		if ($conn->query($sql) === TRUE) {
			echo '<script>alert("data lowongan berhasil diaktifkan"); </script>';
 			echo '<meta http-equiv="refresh" content="0;URL=?p=job.views">';
		}else{
			echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
		}
		$conn->close();
	}


	/* update bayar */

	if (isset($_POST['confirm']))
	{
		$getId		= $_REQUEST['id'];
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['transfer']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['transfer']['size'];
		$fileTemp 			= $_FILES['transfer']['tmp_name'];

		$upload_dir 		= "dist/file/transfer/";
		$img 				= basename ($fileName);
		$v_img 				= str_replace(' ','_',$img);

		$id 		= $_POST['id_lowongan'];
		// $transfer 	= $_POST['transfer'];
	  
		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_img) ) 
				{
					
					$query = "INSERT INTO tb_pembayaran ( id_lowongan, transfer)
							VALUES ('$getId', '$v_img' ) ";
		
					if ($conn->query($query) === TRUE) 
					{
						echo '<script>alert("Lowongan berhasil dikonfirmasi"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}else{
						echo "terjadi kesalahan fatal" .$query.' <br> ' .$conn->error;
						echo '<script>alert("data lowongan gagal diupdate"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}

					$sql = "UPDATE tb_lowongan SET
								stat = 1
							WHERE id_lowongan = '$getId'";

					if ($conn->query($sql) === TRUE) 
					{
						echo '<script>alert("Lowongan berhasil dikonfirmasi"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}else{
						echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
						echo '<script>alert("data lowongan gagal diupdate"); </script>';
				 		echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
					}

				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=job.view">';
		}
		$conn->close();
	}
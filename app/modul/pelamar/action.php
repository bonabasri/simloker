<?php
	if ( isset($_POST['save']) ) 
	{
		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];

		$v_nama_depan 		= $_POST['nama_depan'];
		$v_nama_belakang 	= $_POST['nama_belakang'];
		$v_tempat_lahir		= $_POST['tempat_lahir'];

		$date	         	= explode('-',$_POST['tgl_lahir']);
		$v_tgl_lahir 		= $date['2'].'-'.$date['1'].'-'.$date['0'];
		
		$v_jk				= $_POST['jk'];
		$v_agama			= $_POST['agama'];
		$v_alamat			= $_POST['alamat'];
		$v_lulusan			= $_POST['lulusan'];
		$v_usia				= $_POST['usia'];
		$v_no_hp 			= $_POST['no_hp'];
		$v_pengalaman		= $_POST['pengalaman'];
		$v_email 			= $_POST['email'];
		$v_tinggi_badan		= $_POST['tinggi_badan'];

		$v_kelebihan		= $_POST['kelebihan'];

		$upload_dir 		= "../dist/images/foto/";
		$foto 				= basename ($fileName);
		$v_foto 			= str_replace(' ','_',$foto);

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_foto) ) 
				{
					$sql = "INSERT INTO tb_pelamar 
										(
										nama_depan,
										nama_belakang,
										tempat_lahir,
										tgl_lahir,
										jk,
										agama,
										alamat,
										lulusan,
										usia,
										no_hp,
										pengalaman,
										email,
										tinggi_badan,
										foto,
										kelebihan)
									VALUES (
											'$v_nama_depan',
											'$v_nama_belakang',
											'$v_tempat_lahir',
											'$v_tgl_lahir',
											'$v_jk',
											'$v_agama',
											'$v_alamat',
											'$v_lulusan',
											'$v_usia',
											'$v_no_hp',
											'$v_pengalaman',
											'$v_email',
											'$v_tinggi_badan',
											'$v_foto',
											'$v_kelebihan')
											";
					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("data berhasil disimpan"); </script>';
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.view">';
					} else {
						echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
		}
		$conn->close();
	}


	if ( isset($_POST['edit']) ) 
	{
		$getId	= $_REQUEST['id'];
		$cek   	= "SELECT * FROM tb_pelamar WHERE id_pelamar = '".$getId."' "; 
		$res    = $conn->query($cek);
		$data   = $res->fetch_array();

		$allowExt 			= array( 'png', 'jpg', 'jpeg' );

		$fileName 			= $_FILES['foto']['name'];
		$fileExt			= strtolower(end(explode('.', $fileName)));
		$fileSize			= $_FILES['foto']['size'];
		$fileTemp 			= $_FILES['foto']['tmp_name'];

		$v_nama_depan 		= $_POST['nama_depan'];
		$v_nama_belakang 	= $_POST['nama_belakang'];
		$v_tempat_lahir		= $_POST['tempat_lahir'];

		$date	         	= explode('-',$_POST['tgl_lahir']);
		$v_tgl_lahir 		= $date['2'].'-'.$date['1'].'-'.$date['0'];
		
		$v_jk				= $_POST['jk'];
		$v_agama			= $_POST['agama'];
		$v_alamat			= $_POST['alamat'];
		$v_lulusan			= $_POST['lulusan'];
		$v_usia				= $_POST['usia'];
		$v_no_hp 			= $_POST['no_hp'];
		$v_pengalaman		= $_POST['pengalaman'];
		$v_email 			= $_POST['email'];
		$v_tinggi_badan		= $_POST['tinggi_badan'];

		$v_kelebihan		= $_POST['kelebihan'];

		$upload_dir 		= "../dist/images/foto/";
		$foto 				= basename ($fileName);
		$v_foto 			= str_replace(' ','_',$foto);

		// jika foto tidak diubah 
		if ( empty($fileTemp) ) 
		{
			$sql = "UPDATE tb_pelamar SET 
									nama_depan 		= '$v_nama_depan',
									nama_belakang 	= '$v_nama_belakang',
									tempat_lahir 	= '$v_tempat_lahir',
									tgl_lahir 		= '$v_tgl_lahir',
									jk 				= '$v_jk',
									agama 			= '$v_agama',
									alamat 			= '$v_alamat',
									lulusan 		= '$v_lulusan',
									usia 			= '$v_usia',
									no_hp 			= '$v_no_hp',
									pengalaman 		= '$v_pengalaman',
									email 			= '$v_email',
									tinggi_badan 	= '$v_tinggi_badan',
									kelebihan 		= '$v_kelebihan'
								WHERE id_pelamar 	= '$getId' ";

			if ($conn->query($sql) === TRUE) {

				echo '<script>alert("data berhasil diubah"); </script>';
 				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.view">';	    	
			}else{
				echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
			}
		}

		// jika foto diubah
		else if( !empty($fileTemp) ) 
		{

		if ( in_array( $fileExt, $allowExt ) === TRUE ) 
		{
			if ( $fileSize < 1044070 ) 
			{
				if ( move_uploaded_file( $fileTemp,$upload_dir.$v_foto) ) 
				{
					unlink($upload_dir.$data['foto']);

					$sql = "UPDATE tb_pelamar SET 
									nama_depan 		= '$v_nama_depan',
									nama_belakang 	= '$v_nama_belakang',
									tempat_lahir 	= '$v_tempat_lahir',
									tgl_lahir 		= '$v_tgl_lahir',
									jk 				= '$v_jk',
									agama 			= '$v_agama',
									alamat 			= '$v_alamat',
									lulusan 		= '$v_lulusan',
									usia 			= '$v_usia',
									no_hp 			= '$v_no_hp',
									pengalaman 		= '$v_pengalaman',
									email 			= '$v_email',
									tinggi_badan 	= '$v_tinggi_badan',
									foto 			= '$v_foto',
									kelebihan 		= '$v_kelebihan'
								WHERE id_pelamar 	= '$getId' ";

					if ( $conn->query($sql) === TRUE ) {
						echo '<script>alert("data berhasil disimpan"); </script>';
	 					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.view">';
					} else {
						echo "terjadi kesalahan fatal" .$sql.' <br> ' .$conn->error;
					}
				} else {
					echo '<script>alert("gagal upload file"); </script>';
					echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
				}
			} else {
				echo '<script>alert("ukuran file maks 1 mb"); </script>';
				echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
			}
		} else {
			echo '<script>alert("ekstensi file tidak diijinkan"); </script>';
			echo '<meta http-equiv="refresh" content="0;URL=?p=pelamar.add">';
			}
		}
		$conn->close();
	}
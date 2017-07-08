<?php

	echo '<div class="col-md-8">

            <h1 class="page-header" >  
                <small>Find Job</small>
            </h1>';

            if ((isset($_POST['cari'])) AND ($_POST['search'] <> "")) {
                $search = $_POST['search'];
                $sql = "SELECT *FROM tb_lowongan 
                        INNER JOIN tb_kategori_pekerjaan ON 
                        (tb_lowongan.id_kategori_pekerjaan=tb_kategori_pekerjaan.id_kategori_kerja)
                        INNER JOIN tb_kategori_pendidikan ON 
                        (tb_lowongan.id_pendidikan=tb_kategori_pendidikan.id_pendidikan)
                        INNER JOIN tb_jenis_pekerjaan ON
                        (tb_lowongan.id_jenis=tb_jenis_pekerjaan.id_jenis)
                        INNER JOIN tb_perusahaan ON 
                        (tb_lowongan.user_id=tb_perusahaan.user_id) 
                        WHERE tb_lowongan.posisi LIKE '%$search' OR
                        		tb_kategori_pekerjaan.nama_kategori_kerja LIKE '%$search' OR
                        			tb_kategori_pendidikan.nama_pendidikan LIKE '%$search' OR
                        				tb_jenis_pekerjaan.nama_jenis_kerja LIKE '%$search' ";

                $res = $conn->query($sql);
                $hasil = mysqli_num_rows($res);

                if ($hasil > 0){
                    echo '<h2>'.$hasil.' results lowongan found for: <span class="text-navy">"'.$search.'"</span></h2>';
                
                foreach ($res as $row => $data) {
                    
                    echo '<div class="col-md-2" id="crop">
		                <img class="img-responsive" src="dist/images/logo/'.$data['logo'].'" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110">
		                </div>
		                
		                <h4>
		                    <a href="?p=job&id='.$data['id_lowongan'].'" class="title"> '.$data['posisi'].'</a>
		                </h4>
		                <h5>
		                    <a href="index.php" id="conten">
		                    <span class="glyphicon glyphicon-list-alt"></span>
		                '.$data['nama_perusahaan'].' 
                    	<span class="fa fa-bookmark fa-fw"></span> '.$data['nama_jenis_kerja'] .' 
                    	<span class="glyphicon glyphicon-map-marker"></span> '.$data['kota'].' </a>
                
                    	<span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                    	date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                    	date_format(date_create($data['tgl_akhir']), 'd-m-Y').' 
                     	<span class="glyphicon glyphicon-tags"></span> '. 
                     	$data['nama_kategori_kerja'].' '.$data['jk_require'].'
                     	<span class="fa fa-graduation-cap fa-fw"></span> '. 
                     	$data['nama_pendidikan'].'
                
                		</h5>
                		<br>
                		<hr>
		                ';
                    }
                }
                else{
                    echo "<h2>Not Found! </h2> <h5>Data yang kamu cari tidak ada pada database.</h5>";
                }
            }else{
                echo '<h2>Not Found! </h2>Silahkan masukkan kata kunci yang kamu cari dengan benar.';
            }
        echo "</div>";
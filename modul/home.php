<!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header" >
                    
                    <small>Lowongan Terbaru</small>
                </h1>
                <?php
                    include 'core.php';

                    $sql = "SELECT *FROM tb_lowongan 
                        INNER JOIN tb_kategori_pekerjaan ON 
                        (tb_lowongan.id_kategori_pekerjaan=tb_kategori_pekerjaan.id_kategori_kerja)
                        INNER JOIN tb_kategori_pendidikan ON 
                        (tb_lowongan.id_pendidikan=tb_kategori_pendidikan.id_pendidikan)
                        INNER JOIN tb_jenis_pekerjaan ON
                        (tb_lowongan.id_jenis=tb_jenis_pekerjaan.id_jenis)
                        INNER JOIN tb_perusahaan ON 
                        (tb_lowongan.user_id=tb_perusahaan.user_id) ORDER BY tb_lowongan.id_lowongan DESC LIMIT 10";
                        $res = $conn->query($sql);
                        foreach ($res as $row => $data) {
                ?>
                <!-- First Blog Post -->
                
                <div class="col-md-2" id="crop">
                <img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110">
                </div>
                
                <h4>
                    <a href="?p=job&id=<?php echo $data['id_lowongan']; ?>" class="title"><?php echo $data['posisi']; ?></a>
                </h4>
                <h5>
                    <a href="index.php" id="conten">
                    <span class="glyphicon glyphicon-list-alt"></span>
                <?php echo $data['nama_perusahaan'].' 
                    <span class="fa fa-bookmark fa-fw"></span> '. $data['nama_jenis_kerja'] .' 
                    <span class="glyphicon glyphicon-map-marker"></span> '. $data['kota'].' </a>
                
                    <span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                    date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                    date_format(date_create($data['tgl_akhir']), 'd-m-Y').' 
                     <span class="glyphicon glyphicon-tags"></span> '. 
                     $data['nama_kategori_kerja'].' '.$data['jk_require'].' 
                     <span class="fa fa-graduation-cap fa-fw"></span> '. 
                     $data['nama_pendidikan']; 
                ?>
                </h5>
                <br>
                <!-- <a class="btn btn-primary btn-sm" href="#">View More </a> -->

                <hr>
                <?php } ?>
                
                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>
            <?php require('sidebar.php'); ?>
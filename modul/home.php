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
                
                <!-- <br> -->
                <div class="col-md-2" id="crop">
                <img class="img-responsive" src="dist/images/logo/<?php echo $data['logo']; ?>" alt="" sizes="{max-width: 110px} 100vw, 110px" height="110" width="110">
                </div>
                <!-- <p> -->
                <h4>
                    <a href="?p=job&id=<?php echo $data['id_lowongan']; ?>" class="title"><?php echo $data['posisi']; ?></a>
                </h4>
                <h5>
                <!-- <p> -->
                    <a href="index.php" id="conten"><span class="glyphicon glyphicon-list-alt"></span> <?php echo $data['nama_perusahaan'].' <span class="fa fa-bookmark fa-fw"></span> '. $data['nama_jenis_kerja'] .' <span class="glyphicon glyphicon-map-marker"></span> '. $data['kota']; ?></a>
                
                    <span class="fa fa-calendar fa-fw"></span><span id=conten> <?php echo date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. date_format(date_create($data['tgl_akhir']), 'd-m-Y'); ?>
                    <?php echo $data['nama_kategori_kerja'].' '.$data['jk_require']; ?></span>
                </h5>
                <br>
                <!-- <a class="btn btn-primary btn-sm" href="#">View More </a> -->

                <hr>
                <?php } ?>
                <!-- <hr> -->
                <!-- First Blog Post -->
                <!-- <h4>
                    <a href="#">Blog Post Title</a>
                </h4>
                <h5>
                <p>
                    by <a href="index.php">Start Bootstrap</a>
                </p>
                </h5>
                <p><span class="glyphicon glyphicon-time"></span> Posted on August 28, 2013 at 10:00 PM</p> -->
                <!-- <hr> -->
                <!-- <div class="col-md-3">
                <img class="img-responsive" src="dist/unch.jpg" alt="" sizes="{max-width: 120px} 50vw, 120px" height="115" width="115">
                </div>
                <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.</p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <!-- <hr> -->

                
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
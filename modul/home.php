<!-- Blog Entries Column -->
            <div class="col-md-8">

                <div class="row" style="margin-left: 2px;">
                    <div class="col-md-6">
                        <a href="#">
                            <img class="img-responsive" src="dist/banner-employers.png">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="?p=home">
                            <img class="img-responsive" src="dist/banner-jobseekers.png">
                        </a>
                    </div>
                </div>
                <br>
                <h1 class="page-header" style="margin-left: 17px">
                    
                    <small>Lowongan Terbaru</small>
                </h1>
                <?php
                    include 'core.php';
                    $sql = "SELECT *FROM tb_lowongan a
                                LEFT JOIN tb_kategori_pekerjaan b ON 
                                (a.id_kategori_pekerjaan=b.id_kategori_kerja)
                                LEFT JOIN tb_kategori_pendidikan c ON 
                                (a.id_pendidikan=c.id_pendidikan)
                                LEFT JOIN tb_jenis_pekerjaan d ON
                                (a.id_jenis=d.id_jenis)
                                LEFT JOIN tb_perusahaan e ON 
                                (a.user_id=e.user_id)
                            WHERE a.stat = 2 
                            ORDER BY a.id_lowongan DESC LIMIT 20";
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
                    <span class="glyphicon glyphicon-map-marker"></span> '. $data['kota'].' 
                
                    <span class="fa fa-calendar fa-fw"></span><span id=conten> '.
                    date_format(date_create($data['tgl_posting']), 'd-m-Y').' - '. 
                    date_format(date_create($data['tgl_akhir']), 'd-m-Y'). ' 
                     <span class="glyphicon glyphicon-tags"></span> '. 
                      $data['nama_kategori_kerja'].' '.$data['jk_require'].' 
                     <span class="fa fa-graduation-cap fa-fw"></span> '. 
                     $data['nama_pendidikan'].' </a>' ; 
                ?>
                </h5>
                <br>
                <!-- <a class="btn btn-primary btn-sm" href="#">View More </a> -->

                <hr>
                <?php } ?>
                
                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>
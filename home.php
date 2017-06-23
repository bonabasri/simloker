<!-- Blog Entries Column -->
            <div class="col-md-9">

                <h1 class="page-header" style="margin: 0; font-family: 'Open Sans', sans-serif; font-size: 36px;">
                    
                    <small>Lowongan Terbaru</small>
                </h1>
                <?php
                    include 'core.php';

                    $sql = "SELECT *FROM tb_lowongan 
                        INNER JOIN tb_kategori_pekerjaan ON 
                        (tb_lowongan.id_kategori_pekerjaan=tb_kategori_pekerjaan.id_kategori_kerja)
                        INNER JOIN tb_kategori_pendidikan ON 
                        (tb_lowongan.id_pendidikan=tb_kategori_pendidikan.id_pendidikan)
                        INNER JOIN tb_perusahaan ON 
                        (tb_lowongan.id_perusahaan=tb_perusahaan.id_perusahaan) ORDER BY tb_lowongan.id_lowongan DESC";
                        $res = $conn->query($sql);
                        foreach ($res as $row => $data) {
                ?>
                <!-- First Blog Post -->
                
                <br>
                <div class="col-md-2">
                <img class="img-responsive" src="dist/payung.jpg" alt="" sizes="{max-width: 150px} 100vw, 150px" height="110" width="110">
                </div>
                <!-- <p> -->
                <h4>
                    <a href="#" style="font-family: 'Open Sans', sans-serif; font-size: 15px;><?php echo $data['posisi']; ?></a>
                </h4>
                <h5>
                <!-- <p> -->
                    <a href="index.php"><span class="glyphicon glyphicon-list-alt"></span> <?php echo $data['nama_perusahaan'].' <span class="glyphicon glyphicon-map-marker"></span> '. $data['kota']; ?></a>
                </p>
                </h5>
                <p><span class="glyphicon glyphicon-calendar"></span> <?php echo $data['tgl_posting'].' - '. $data['tgl_akhir']; ?></p>
                <?php echo $data['nama_kategori_kerja'].' '.$data['jk_require']; ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <!-- <hr> -->
                <?php } ?>
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
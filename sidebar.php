        <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Cari Lowongan</h4>
                    <form role="search" class="navbar-form-custom" action="?p=search" method="post">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search Job">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="submit" name="cari">
                                    <span class="glyphicon glyphicon-search"></span>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Kategori Lowongan</h4>
                    <div class="row">
                        <div class="col-lg-8">
                        <?php
                            $sql = "SELECT a.*, b.id_lowongan, b.id_kategori_pekerjaan 
                                        FROM tb_kategori_pekerjaan a
                                    LEFT JOIN tb_lowongan b ON a.id_kategori_kerja = b.id_kategori_pekerjaan";
                            $res = $conn->query($sql);
                            foreach ($res as $row => $data) {
                            echo'
                            <ul class="list-unstyled">
                                <li><a href="?p=category&id='.$data["id_kategori_pekerjaan"].'"> '.$data['nama_kategori_kerja'].'</a>
                                </li>
                            </ul>'; 
                            }
                        ?>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Recent Jobs</h4>
                    <?php 
                        $sql = "SELECT id_lowongan,posisi from tb_lowongan order by id_lowongan DESC";
                        $res = $conn->query($sql);
                        foreach ($res as $row => $data) {
                        echo'
                        <ul class="list-unstyled">
                            <li><a href="?p=job&id='.$data["id_lowongan"].'"> ' .$data["posisi"].'</a>
                            </li>
                        </ul>';
                     
                        }
                    ?>
                </div>

            </div>
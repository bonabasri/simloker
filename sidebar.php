        <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Cari Lowongan</h4>
                    <div class="input-group">
                        <input type="text" class="form-control">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Kategori Lowongan</h4>
                    <div class="row">
                        <div class="col-lg-8">
                        <?php
                            $sql = "SELECT *FROM tb_kategori_pekerjaan";
                            $res = $conn->query($sql);
                            foreach ($res as $row => $data) {
                        ?>
                            <ul class="list-unstyled">
                                <li><a href="#"><?php echo $data['nama_kategori_kerja']; ?></a>
                                </li>
                            </ul>
                        <?php 
                        }
                        ?>
                        </div>
                        
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Recent Jobs</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>
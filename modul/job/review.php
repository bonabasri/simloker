
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>Review Lowongan</small></h3>
        
            <div class="panel panel-default">
            <div class="panel-heading">Info Lowongan</div>
                <div class="panel-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lowongan</th>
                        <th>Nama Perusahaan</th>
                        <th>Logo Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    
            <?php
                $GetID  = $_GET['id'];
                $sql = "SELECT *FROM tb_lowongan a
                    LEFT JOIN tb_kategori_pekerjaan b ON (a.id_kategori_pekerjaan=b.id_kategori_kerja)
                    LEFT JOIN tb_jenis_pekerjaan c ON (a.id_jenis=
                        c.id_jenis)
                    LEFT JOIN tb_kategori_pendidikan d ON (a.id_pendidikan=d.id_pendidikan)
                    LEFT JOIN tb_perusahaan e ON (a.user_id=e.user_id)
                    LEFT JOIN tb_user f ON (a.user_id= f.user_id)
                    WHERE a.id_lowongan = '$GetID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();

                $status = $data['stat'];
                    $status = $data['stat'];
                            if ($status === '0') {
                                $status = '<span class="label label-default">Tidak Aktif</span>';
                            } elseif ($status === '1') {
                                $status = '<span class="label label-primary">Konfirmasi Pembayaran</span>';
                            } elseif ($status === '2') {
                                $status = '<span class="label label-success">Sudah Aktif</span>';
                            } 
            ?>
                <tr>
                    <td><?php echo $data['posisi']; ?></td>
                    <td><?php echo $data['nama_perusahaan']; ?></td>
                    <td><img src="dist/images/logo/<?php echo $data['logo']; ?>" width="50" height="50"></td>
                </tr>
                </tbody>
                </table>
                   
                <form class="" role="form" action="?p=job.action" id="defaultForm" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nomor Telepon</th>
                        <th>Alamat</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $GetID; ?>">
                        <input type="hidden" name="id_lowongan" value="<?php echo $data['id_lowongan']; ?>">
                        <td><?php echo $data['user_id']; ?></td>
                        <td><?php echo $data['email']; ?></td>
                        <td><?php echo $data['no_telp']; ?></td>
                        <td><?php echo $data['alamat']; ?></td>
                        
                    </tr>
                </tbody>
                </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Bukti Transfer</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><img src="dist/file/transfer/<?php echo $data['transfer']; ?>" width="130" height="80"></td>
                        <td><?php echo $status; ?><br>
                        <div class="form-group">
                            <select class="form-control" name="stat"/>
                            <option value="<?php echo $data['stat']; ?>"><?php echo $status; ?></option>
                            <option value="0">Tidak Aktif</option>
                            <option value="2">Aktif</option>
                        </select>
                        </div>
                        </td>

                    </tr>
                </tbody>
                </table>
                    <button class="btn btn-primary pull-right" type="submit" name="update">Konfirmasi
                        </button>
                    </form>
                </div>
            </div>
        </div>

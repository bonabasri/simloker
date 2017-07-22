
    <div class="row">
        <div class="col-lg-8">
            <h3 class="page-header"><small>Review Resume</small></h3>
        
            <div class="panel panel-default">
            <div class="panel-heading">Info Resume</div>
                <div class="panel-body">
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lowongan</th>
                        <th>Nama Pelamar</th>
                        <th>Email</th>
                        <th>Foto Pelamar</th>
                    </tr>
                </thead>
                <tbody>
                    
            <?php
                $GetID  = $_GET['id'];
                $sql = "SELECT *FROM tb_lamaran a 
                        left join tb_lowongan b on a.id_lowongan = b.id_lowongan
                        left join tb_pelamar c on a.user_id = c.user_id
                        left join tb_user e on c.user_id = e.user_id
                        left join tb_perusahaan d on b.user_id = d.user_id
                        WHERE a.id_lamaran = '$GetID'";
                $res = $conn->query($sql);
                $data = $res->fetch_assoc();

                $status = $data['status'];
                    if ($status === '0') {
                        $status = '<span class="label label-default">Pelamar Baru</span>';
                    } elseif ($status === '1') {
                        $status = '<span class="label label-primary">Proses Interview</span>';
                    } elseif ($status === '2') {
                        $status = '<span class="label label-success">Diterima</span>';
                    }
            ?>
                <tr>
                    <td><?php echo $data['posisi']; ?></td>
                    <td><?php echo $data['nama_depan'].' '.$data['nama_belakang']; ?></td>
                    <td><?php echo $data['email']; ?></td>
                    <td style="text-align: center;"><img src="dist/images/foto/<?php echo $data['foto']; ?>" width="80" height="80"></td>
                </tr>
                </tbody>
                </table>
                   
                <form class="" role="form" action="?p=recruit.action" id="defaultForm" method="post" enctype="multipart/form-data">

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>File CV</th>
                        <th>File Ijazah</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="dist/file/cv/<?php echo $data['file']; ?>"><?php echo $data['file']; ?></a></td>
                        <td><a href="dist/file/ijazah/<?php echo $data['files']; ?>"><?php echo $data['files']; ?></a></td>
                        <input type="hidden" name="id" value="<?php echo $GetID; ?>">
                        <input type="hidden" name="id_lamaran" value="<?php echo $data['id_lamaran']; ?>"><br>
                        
                    </tr>
                </tbody>
                </table>

                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Message</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <input type="hidden" name="id" value="<?php echo $GetID; ?>">
                        <input type="hidden" name="id_lamaran" value="<?php echo $data['id_lamaran']; ?>">
                        <td>
                            <textarea name="message" class="form-control" placeholder="Tulis pesan disini"><?php echo $data['message'];?></textarea>
                        </td><br>
                        
                    </tr>
                </tbody>
                </table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal Interview</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="width: 50%;">
                            <input type="text" name="tgl_interview" id="datepicker" value="<?php echo date_format(date_create($data['tgl_interview']), 'd-m-Y'); ?>" class="form-control"/>
                        </td>
                        <td>
                            <select class="form-control" name="status">
                                <option value="<?php echo $data['status']; ?>" name="status"><?php echo $status; ?></option>
                                <option value="1">Undang Interview</option>
                                <option value="2">Diterima Kerja</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
                </table>
                    <button class="btn btn-primary pull-right" type="submit" name="update">Kirim
                        </button>
                    </form>
                </div>
            </div>
        </div>

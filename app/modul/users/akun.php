<?php

/**
 * PSB Online - SMK Kosgoro Nganjuk
 * ------------------------------------------------------------------------
 * @package     PSB Online
 * @author      Luqman Hakim <luckman.heckem@gmail.com>
 * @copyright   Copyright (c) 2016
 * @link        github.com/luqmanhakim1
 * ------------------------------------------------------------------------
 * Template by www.startbootstrap.com
 */

?>

<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">Profil User</h3>
    </div>
</div>

<div class="btn-group" role="group" aria-label="..." style="margin-bottom: 10px;">
    <a class="btn btn-default" title="New Data" data-toggle="modal" data-target="#add" aria-hidden="true"><i class="fa fa-plus fa-fw"></i> New Data</a>
    <a href="?p=users.profile&id=<?php echo $_SESSION['usr_id']; ?>" title="Edit Data" class="btn btn-default"><i class="fa fa-edit fa-fw"></i> Edit Data</a>
</div>

<?php
    $id   = $_SESSION['usr_id'];
    $sql  = mysqli_query($conn, "SELECT * FROM tb_user WHERE usr_id = $id ");
    $data = mysqli_fetch_assoc($sql);
?>

<div class="row">
    <div class="col-lg-12"> 
        <div class="panel panel-primary">
            <div class="panel-heading"></div>
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $data['usr_username']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Panitia</td>
                                    <td><?php echo $data['usr_nama']; ?></td>
                                </tr>
                                <tr>
                                    <td>NIP</td>
                                    <td><?php echo $data['usr_nip']; ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td><?php echo $data['usr_jk']; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td><?php echo $data['usr_alamat']; ?></td>
                                </tr>
                                <tr>
                                    <td>Nomor HP</td>
                                    <td><?php echo $data['usr_no_telp']; ?></td>
                                </tr>
                            </thead>

                            <tbody>

                            <!-- MODAL -->
                                <!-- BEGIN ADD -->
                                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title">New User</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="?p=users.action" method="post">
                                                    <div class="form-group">
                                                    <label> Username</label>
                                                        <input type="text" class="form-control" name="usr_username" placeholder="Username" required/>
                                                    </div>
                                                    <div class="form-group">
                                                    <label> Password</label>
                                                        <input type="password" class="form-control" name="usr_password" placeholder="Password"  required/>
                                                    </div>
                                                    <div class="form-group">
                                                    <label> Nama Lengkap</label>
                                                        <input type="text" class="form-control" name="usr_nama" placeholder="Nama Lengkap" required/>
                                                    </div>
                                                    <div class="form-group">
                                                    <label> NIP</label>
                                                        <input type="text" class="form-control" name="usr_nip" placeholder="NIP" maxlength="15" required/>
                                                    </div>
                                                    <div class="form-group">
                                                    <label>Jenis Kelamin</label>
                                                        <select name="usr_jk" class="form-control" required />
                                                            <option value=" ">-Pilih-</option>
                                                            <option value="L">L</option>
                                                            <option value="P">P</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                    <label> Alamat</label>
                                                        <input type="text" class="form-control" name="usr_alamat" placeholder="Alamat" required/>
                                                    </div>
                                                    <div class="form-group">
                                                    <label> Nomor HP</label>
                                                        <input type="text" name="usr_no_telp" pattern="[0-9]{12,12}" class="form-control" placeholder="No Telepon" maxlength="12" required/>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" name="insert" class="btn btn-primary"> Save</button>
                                                    <button type="button" class="btn btn-default" data-dismiss="modal"> Cancel</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <!-- END ADD -->
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                          
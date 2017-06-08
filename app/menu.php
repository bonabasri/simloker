<?php


 // require_once ('../lib/library.php');

?>

<!-- Navigation -->
<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="admin.php">SISFOLOWONGANKERJA</a>                   
    </div>
        
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['uname']; ?> <i class="fa fa-caret-down fa-fw"></i>
                </a>
                <ul class="dropdown-menu dropdown-messages">
                    <li>
                        <a href="#">
                            <strong><?php echo $_SESSION['nama']; ?></strong>
                        </a>
                        
                    </li>
                    <li class="divider"></li>
                        <li><a href="../" target="_blank"><i class="fa fa-eye fa-fw"></i> Lihat Website</a>
                    </li>
                    <li class="divider"></li>
                        <li><a href="?p=users.akun"><i class="fa fa-user fa-fw"></i> Profil</a>
                    </li>
                    <li class="divider"></li>
                        <li><a href="?p=users.password"><i class="fa fa-key fa-fw"></i> Ganti Password</a>
                    </li>
                    <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-power-off fa-fw"></i> Log Out...</a>
                    </li>
                </ul>
            </li>
        </ul>
<?php 
    if ($_SESSION['uac'] === 'ADM') 
    { 
?>
           <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="?p=dashboard"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?p=users.akun"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li>
                            <a href="?p=lowongan.view"><i class="fa fa-thumb-tack fa-fw"></i> Pasang Lowongan</a>
                        </li>
                        <li>
                            <a href="?p=resume.resume"><i class="fa fa-rocket fa-fw"></i> Resume</a>
                        </li>
                        <li>
                            <a href="?p=pelamar.view"><i class="fa fa-users fa-fw"></i> Data Pelamar</a>
                        </li>
                        <li>
                            <a href="?p=perusahaan.view"><i class="fa fa-institution fa-fw"></i> Data Perusahaan</a>
                        </li>
                        <li>
                            <a href="?p=info.view"><i class="fa fa-info fa-fw"></i> Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
<?php 
    } else if ($_SESSION['uac'] === 'PELAMAR') {
?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="?p=dashboard"><i class="fa fa-windows fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?p=users.akun"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li>
                            <a href="?p=resume.resume"><i class="fa fa-rocket fa-fw"></i> Resume</a>
                        </li>
                        <li>
                            <a href="?p=info.view"><i class="fa fa-info fa-fw"></i> Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
<?php 
    } else if ($_SESSION['uac'] === 'PERUSAHAAN') {
?>
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="?p=dashboard"><i class="fa fa-windows fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="?p=users.akun"><i class="fa fa-user fa-fw"></i> Profil</a>
                        </li>
                        <li>
                            <a href="?p=resume.resume"><i class="fa fa-rocket fa-fw"></i> Resume</a>
                        </li>
                        <li>
                            <a href="?p=perusahaan.views"><i class="fa fa-institution fa-fw"></i> Data Perusahaan</a>
                        </li>
                        <li>
                            <a href="?p=info.view"><i class="fa fa-info fa-fw"></i> Blog</a>
                        </li>
                    </ul>
                </div>
            </div>
<?php 
    } else {
    }
?>
        </nav>

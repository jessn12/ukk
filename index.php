<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="text/javascript" href="../bootstrap/js/bootstrap.js">
    <link rel="icon" href="../img/bmw.png">
    <link rel="stylesheet" href="index.css">
    <title>header</title>
</head>
<?php
    include '../koneksi.php';
    session_start();
  if ($_SESSION['level'] == ""){
    header("location:../login.php?data=belum_login");
  }
    ?>

<body>
    <nav class="navbar navbar-expand-lg " style="background-color:#F52E30;">
        <img src="../img/ya-removebg-preview.png" alt="" width="50" height="50" class="d-inline-block a1ign-text-top">
        <a class="navbar-brand text-white" href="index.php">PRA UKK RPL</a>
        <button class="navbar-toggler" type="button" data-toggle="co11apse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-togg1er-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="data-anggota.php" hidden>REGIS</a>
                </li>
           
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item">
                    <a class="nav-link btn-sm btn btn-outline-dark mr-2 text-light" onclick="return confirm ('yakin dek keluar???')" href="../logout.php">Log out</a>
                </li>
                <li>
                    <span class="navbar-text"><b>Selamat Datang <?php echo $_SESSION['username'];?></b></span>
                </li>
            </ul>
        </div>
    </nav>
    <div class="d-flex justify-content-between" style="margin-top: -10px;"><h2 class="title">DATA USER</h2>
<h1 style="font-size: 40px; font-family: arial; margin-top:30px; margin-right:40px;" id="jam"></h1>
</div>
</div>

    
<script type="text/javascript">
    window.onload = function() { jam(); }
   
    function jam() {
     var e = document.getElementById('jam'),
     d = new Date(), h, m, s;
     h = d.getHours();
     m = set(d.getMinutes());
     s = set(d.getSeconds());
   
     e.innerHTML = h +':'+ m +':'+ s;
   
     setTimeout('jam()', 1000);
    }
   
    function set(e) {
     e = e < 10 ? '0'+ e : e;
     return e;
    }
   </script>
<div id="hasil">
<div class="input-group ">
    <form role="search" class="d-flex">
    <input type="text" name="cari" class="form-control rounded col-md-6 mt-3" style="margin-left: 30px;" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
  <button type="submit" class="btn btn-outline-danger col-md-3 mt-3">search</button>
  <a href="register.php" class="btn btn-outline-primary col-md-3 mt-3 mx-2">input user</a>
  <a href="index.php" class="btn btn-outline-primary col-md-3 mt-3">reset</a>
</form>
 </div>
    <div class="animation">
        <div class="card shadow mb-4" style="width: 95%; margin-left:30px; margin-top:10px;">
            <div class="card-body">
                <div class="table-responsive">
                    <div class="overflow-table">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead class="position-stc text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>level</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                <?php
                                include '../koneksi.php';
                               if (isset($_GET['cari'])) {
                                $cari = $_GET['cari'];
                                $data = mysqli_query($koneksi, "select * from t_login where username like '%" . $cari . "%' or level like '%" . $cari . "%'");
                            } else {
                                $data = mysqli_query($koneksi, "select * from t_login");
                            }
                                $number = 1;
                                while ($d = mysqli_fetch_array($data)) {
                                ?>
                                    <tr>
                                        <td hidden><?php $d['id_login']; ?></td>
                                        <td><?php echo $number++ ?></td>
                                        <td><?= $d['username']; ?></td>
                                        <td><?= $d['level']; ?></td>
                                        <td class="text-center">
                                            <a href="edit.php?id=<?= $d['id_login'] ?>" class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm">Edit</a>
                                        </td>
                                        <td class="text-center">                                         
                                        <a href="hapus.php?id=<?= $d['id_login'] ?>" onclick="return confirm ('Mau menghapus user ini?')" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">hapus</a>                                 
                                        </td>
                                    </tr>
                                    </td>
                                    </tr>
                                <?php
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

    </div>
</body>
<script 
</html>




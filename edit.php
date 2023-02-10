<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="text/javascript" href="../bootstrap/js/bootstrap.js">
    <link rel="stylesheet" href="./regis.css">
    <link rel="icon" href="../img/photo_2023-01-26_22-23-37.jpg">
    <title>login</title>
</head>
<body>

<?php 
        include '../koneksi.php';
        ?>
    <div class="card mb-3" style="max-width: 620px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="../img/ya-removebg-preview.png" class="img" alt="...">
            </div>
            <div class="col-md-8 text-center ">
                <div class="card-body">
                    <h5 class="card-title">EDIT</h5>

                    <?php 
                            $id = $_GET['id'];
                            $data = mysqli_query($koneksi, "select * from t_login where id_login='$id'");
                            while($d =mysqli_fetch_array($data )) {
                            ?>     
                    <form action="edit-act.php" method="POST" class="form-horizontal">
                    <input type="hidden" name="id_login" value="<?php echo $d['id_login'] ?>">
                        <div class="">
                            <div class="test">
                                <div class="form-grup" value="opacity:60px;">
                                    <label>USERNAME</label>
                                    <br>
                                    <input type="text" name="username" placeholder="username" class="form-control"  value="<?php echo $d['username'] ?>">
                                    <label>PASSWORD</label>
                                    <br>
                                    <input type="password" name="password" placeholder="password" class="form-control" value="<?php echo $d['password'] ?>">
                                    <br>
                                    <select class="form-control" name="level" value="<?php echo $d['level'] ?>">
                                                <option selected>LEVEL</option> 
                                               <option value="admin">admin</option>
                                               <option value="user">user</option>
                                            </select><br>
                                            <div class="d-flex col-7">
                                            <input type="submit" value="update" class="btn btn-outline-danger col-12 mr-1 " onclick="return confirm ('berhasil!!!')">
                                            <a href="index.php" class="btn btn-outline-primary col-12 ml-2">back</a></div>
                                </div>
                            </div>
                            <br>
                        </div>
                </div>
            </div>
            </form>
            <?php 
            }
            ?>
        </div>
    </div>
    </div>
    </div>
</body>

</html>



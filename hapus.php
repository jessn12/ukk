<?php 
include '../koneksi.php';

$i =$_GET['id'];

mysqli_query($koneksi,"delete from t_login where id_login='$i'"); 
    
header("location:index.php");
?>
<?php 
include '../koneksi.php';

$u =$_POST['username'];
$p =md5($_POST['password']); 
$l =$_POST['level'];

mysqli_query($koneksi,"insert into t_login values ('','$u','$p','$l')"); 
   
header("location:index.php");
?> 
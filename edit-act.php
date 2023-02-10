<?php 
include '../koneksi.php';

$i =$_POST['id_login'];
$u =$_POST['username'];
$p =md5($_POST['password']); 
$l =$_POST['level'];

mysqli_query($koneksi, "update t_login set username='$u', password='$p', level='$l' where id_login='$i'"); 
     
header("location:index.php");
?>
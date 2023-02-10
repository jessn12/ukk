<?php 
 
session_start(); 
  
include 'koneksi.php'; 
  
$username =$_POST['username']; 
$password =md5($_POST['password']); 
 
$data = mysqli_query($koneksi,"select* from t_login where username='$username' and password='$password'"); 
  
$cek = mysqli_num_rows($data); 
 
if($cek>0){ 
    $login = mysqli_fetch_assoc($data); 
}if($login['level'] == "admin"){ 
    $_SESSION['status']="login"; 
    $_SESSION['username']=$username;   
    $_SESSION['level']="admin"; 
    header("location:admin/index.php"); 
 
}else if($login['level'] == "user"){ 
    $_SESSION['status']="login"; 
    $_SESSION['username']=$username;   
    $_SESSION['level']="user"; 
    header("location:user/index.php");
    
// }else if($login['level'] == "admin-key"){ 
//     $_SESSION['status']="login"; 
//     $_SESSION['username']=$username;   
//     $_SESSION['level']="admin-key"; 
//     header("location:admin-key/data-user.php");

// }else if($login['level'] == "pembina"){ 
//     $_SESSION['status']="login"; 
//     $_SESSION['username']=$username;   
//     $_SESSION['level']="pembina"; 
//     header("location:pembina/index.php");
 
}else{ 
    header("location:index.php?data=gagal"); 
}
?>
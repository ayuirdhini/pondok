<?php
include('koneksi.php');

$user = $_POST['username'];
$pass = ($_POST['password']);
$sql = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$user' AND password='$pass'") or die(mysqli_error($koneksi));
        if(mysqli_num_rows($sql) == 0)  
    {
    echo '<script language="javascript">alert("Username atau Password salah"); document.location="Login.php";</script>';
    }
    else
        {
        $row = mysqli_fetch_assoc($sql);
        session_start();
        if($row['role'] == 'admin')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='admin';
        header("Location: admin/dashboard.php");
        }
    else if($row['role'] == 'panitia')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='panitia';
        header("Location: panitia/dashboard.php");
     }
     else if($row['role'] == 'kepala ponpes')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='kepala ponpes';
        header("Location: kepala-ponpes/dashboard.php");
     }
     else if($row['role'] == 'petugas')
        {
        $_SESSION['username']=$user;
        $_SESSION['role']='petugas';
        header("Location: petugas/dashboard.php");
     }
    else
{
    echo '<script language="javascript">alert("Username atau Password salah"); document.location="login.php";</script>';
}
}
?>
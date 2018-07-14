<?php
session_start();
include"../config/koneksi.php";

$username = $_POST['username'];
$password     = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM admin WHERE username = '$username' AND password='".md5($password)."'");
$row=mysqli_fetch_array($login);
if ($row['username'] == $username AND $row['password'] == md5($password))
{
  session_start();
  $_SESSION['username'] = $row['username'];
  $_SESSION['password'] = $row['password'];
  header('location:../index.php');
}
else
{
   header('location:login.php?login=error');

}
?>
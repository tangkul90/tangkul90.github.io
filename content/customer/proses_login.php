  <?php
session_start();
include"../../admin/config/koneksi.php";

$email = $_POST['email'];
$password     = $_POST['password'];

$login = mysqli_query($connect, "SELECT * FROM customer WHERE email = '$email' AND password='$password'");
$row=mysqli_fetch_array($login);
if ($row['email'] == $email AND $row['password'] == $password)
{
  session_start();
  $_SESSION['email'] = $row['email'];
  $_SESSION['password'] = $row['password'];
  header('location:../../index.php?mod=customer&pg=account');
}
else
{
   header('location:../../index.php?mod=customer&pg=login&login=error');

}
?>
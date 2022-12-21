<?php 
session_start();
if(empty($_SESSION['ID']))
{
  header("location:index.php");
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Trang Login</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Muli'>
</head>

<body>
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">	
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">MiniProject</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?action=view_user">Hiển thị các user</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="view/user/signout.php">Đăng xuất</a>
    </li>
  </ul>
</nav>
<div class="p-3 mb-2 bg-success text-white"><h3>Xin chào ,<?php 
echo $_SESSION['name']; 
?></h3></div>


</body>

</html>
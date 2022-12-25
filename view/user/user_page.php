<?php 
session_start();
if(empty($_SESSION['ID']))
{
  header("location: ?controller=UserController");
}
 ?>
<?php include "view/layout/header.php"?>
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">	
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">MiniProject</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=UserController&action=view_user">Hiển thị các user</a>
    </li>
      <li class="nav-item">
          <a class="nav-link" href="?controller=BookController&action=view_book">Quản lý sách</a>
      </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=UserController&action=process_signout">Đăng xuất</a>
    </li>
  </ul>
</nav>
<div class="p-2 mb-5 bg-success text-white"><h5>Xin chào, <?php echo $_SESSION['name']; ?></h5></div>


<?php include "view/layout/footer.php"?>
<?php
    include 'view/layout/header.php';
?>
	<nav class="navbar navbar-expand-sm bg-primary navbar-dark">	
  <ul class="navbar-nav">
    <li class="nav-item active">
      <a class="nav-link" href="#">MiniProject</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=UserController&action=signin">Đăng nhập</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="?controller=UserController&action=signup">Đăng ký</a>
    </li>
  </ul>
</nav>
<?php
include 'view/layout/footer.php';
?>
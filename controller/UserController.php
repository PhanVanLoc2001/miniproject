
<?php 

$action = '';
if(isset($_GET['action'])){
	$action = $_GET['action'];
}

switch ($action) {
	case '':
		require 'view/user/index.php';
		break;
	case 'signin':
		require 'view/user/signin.php';
		break;
	case 'signup':
		require 'view/user/signup.php';
		break;
	case 'process_signup':
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		require 'model/User.php';
		header("location:?action=signin");
		break;
	case 'process_signin':
		$email = $_POST['email'];
		$password = $_POST['password'];
		require 'model/User.php';
		break;
    case 'process_signout':
        session_start();
        unset($_SESSION['ID']);
        unset($_SESSION['name']);
        require 'view/user/signin.php';
	case 'user':
		require 'view/user/user_page.php';
		break;
	case 'view_user':
		require 'model/User.php';
		require 'view/user/view_user.php';

		break;
	default:
		echo 'action khong hop le!!';
}
?>

<?php 
$conn = mysqli_connect('localhost','root','','miniproject');
mysqli_set_charset($conn,'utf8');



switch ($action) {
	case 'process_signup':
		$sql = "select count(*)from user where email = '$email'";
		$result = mysqli_query($conn,$sql);
		$number_row = mysqli_fetch_array($result)["count(*)"];
	
		if($number_row == 1){
			header("location:?action=signup?error=Email đã tồn tại!");
			exit;
		}
		$sql = "select id from user where email = '$email'";
		$result = mysqli_query($conn,$sql);
		$id = mysqli_fetch_array($result)["id"];

		$sql = "insert into user(name,email,password) values ('$name','$email','$password')";
		mysqli_query($conn,$sql);
		break;
	case 'process_signin':
			$sql = "select * from user where email = '$email' and password = '$password'";
			$result = mysqli_query($conn,$sql);
			$number_row = mysqli_num_rows($result);
	
			if($number_row == 1){

				session_start();
				$each = mysqli_fetch_array($result);
				$_SESSION['ID'] = $each['ID'];
				$_SESSION['name'] = $each['name'];
				if(!empty($_POST["remember-me"])) {
					setcookie ("email",$_POST["email"],time()+ 3600);
					setcookie ("password",$_POST["password"],time()+ 3600);	
				} 
				header("location:?controller=UserController&action=user");
				exit;
			}
			else {
				header("location:?action=signin");

			}
			break;	
	case 'view_user':
		$sql = "select * from user";
		$result = mysqli_query($conn,$sql);
		break;
}
 ?>
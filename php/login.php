<?php 
	session_start();
	include_once 'config.php';
?>
<?php
	$user_name = $_POST ['user_name'];
	$password = $_POST ['password'];

	$_SESSION['varname'] = $user_name;



	$get = "SELECT user_name,password 
	FROM logininfo 
	WHERE password ='$password';";
	


	$result = $conn->query($get);


	if ($result->num_rows>0)
	{
		while ( $row = $result->fetch_assoc()) {
			$puser = $row['user_name'];
			$ppass = $row['password'];

			
			if ($puser==$user_name && $ppass == $password ){
				echo "<script type='text/javascript'>alert('correct user_name or Password');
			window.location='../php/home.php';
			</script>";
			}

			}
	}
			
	else {
			session_destroy();
			echo "<script type='text/javascript'>alert('Wrong user_name or Password');
			window.location='../php/home.php';
			</script>";
		}

?>
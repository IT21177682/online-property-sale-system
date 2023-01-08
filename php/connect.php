<?php
	$FullName = $_POST['FullName'];
	$username = $_POST['username'];
	$Email = $_POST['Email'];
	$PhoneNumber = $_POST['PhoneNumber'];
	$Address = $_POST['Address'];
	$Password = $_POST['Password'];
	$AccountType = $_POST['AccountType'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(FullName, username, Email, PhoneNumber, Address, Password, AccountType)
		values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisss", $FullName, $username, $Email, $PhoneNumber, $Address, $Password,$AccountType);
		$execval = $stmt->execute();
		echo $execval;
		echo "<script type='text/javascript'>alert('Registration sucsesfuly');
			window.location='../php/home.php';
			</script>";
		$stmt->close();
		$conn->close();
	}
?>


<?php

	  $fName = $_POST['firstName'];
      $lName = $_POST['lastName'];
      $password = $_POST['password'];
      $email = $_POST['email'];
      $gender = $_POST['gender'];
      $username = $_POST['username'];
      $memberId = rand(0,1000); 
      $phoneNumber = $_POST['phoneNumber'];


	$conn = new mysqli("localhost", "root", "", "wourkout_web");
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into gymmember(MemberID, PhoneNumber, FirstName, LastName, Username, Passwordd, Email, Gender) values(?, ?, ?, ?, ?, ?,?,?)");
		$stmt->bind_param("isssssss",$memberId, $phoneNumber, $fName, $lName, $username, $password, $email, $gender);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>
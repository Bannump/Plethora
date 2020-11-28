<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <link rel="stylesheet" href="css1.css">
    <style>
    	table{
    		color: orange;
    		font-size: 20px;
    	}
    	th, td{
    		padding: 7px;
    	}
    </style>
</head>
<body>
	<?php  
		$server = "localhost";
		$user = "root";
		$password = "";
		$database = "plethora";

		$connect=mysqli_connect($server, $user, $password, $database);

		if (!$connect) {
			die("ERROR: Cannot connect to database $database on server $server using username $user(".mysqli_connect_errno().", ".mysqli_connect_error().")");
		}
		if (isset($_POST['first']) || isset($_POST['last']) || isset($_POST['reg']) || isset($_POST['university']) || isset($_POST['email']) || isset($_POST['phone']) || isset($_POST['city'])) {
			
		$first=$_POST['first'];
		$last=$_POST['last'];
		$reg=$_POST['reg'];
		$university=$_POST['university'];
		$email=$_POST['email'];
		$phone=$_POST['phone'];
		$city=$_POST['city'];
		$events=$_POST['Art'];
		$a=implode(',', $events);
	
		$userQuery = "insert into registrations(first, last, reg, university, email, phone, city, events) values('$first', '$last', '$reg', '$university', '$email', '$phone', '$city', '$a')";

		$result = mysqli_query($connect, $userQuery);

		if (!$result) {
			die("Could no successfully run Query ($userQuery) from $database: " .mysqli_error($connect));
		}
		else{
			print("<h1 align='center'>The Following record has been added and sent to your mail</h1>");
			print(
				"<table border = '4' bgcolor='black' align='center'>
					<tr><td>First Name</td><td>$first</td></tr>
					<tr><td>Last Name</td><td>$last</td></tr>
					<tr><td>Registration Number</td><td>$reg</td></tr>
					<tr><td>University</td><td>$university</td></tr>
					<tr><td>Email</td><td>$email</td></tr>
					<tr><td>Phone</td><td>$phone</td></tr>
					<tr><td>City</td><td>$city</td></tr>
					<tr><td>events</td><td>$a</td></tr>
					

				</table>	
				");
		}}
		mysqli_close($connect);
	?>
</body>
</html>
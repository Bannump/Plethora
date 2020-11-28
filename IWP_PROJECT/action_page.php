<!DOCTYPE html>
<html>
<head>
    <title>Registrations</title>
    <link rel="stylesheet" href="css1.css">
</head>
<body>
<table border="4px" bgcolor="maroon" style="color: white; border-color: white">
	<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Registration Number</th>
		<th>University</th>
		<th>Email</th>
		<th>phone</th>
		<th>city</th>
		<th>Event</th>
	</tr>
	<?php
		$conn = mysqli_connect("localhost", "root", "", "plethora");
		if($conn-> connect_error){
		die("Connection Failed :". $conn-> connect_error);
		}
		$sql = "select first, last, reg, university, email, phone, city, events from registrations";
		$result=$conn-> query($sql);
		if($result-> num_rows > 0){
			while($row=$result-> fetch_assoc()){
				echo "<tr><td>". $row["first"]."<td>".$row["last"]."<td>".$row["reg"]."<td>".$row["university"]."<td>".$row["email"]."<td>".$row["phone"]."<td>".$row["city"]."<td>".$row["events"]."</td></tr>";
			}
		echo "</td>table";
		}
		else{
			echo "0 result";
		}
		$conn-> close();
	?>
</table>	
</body>
</html>
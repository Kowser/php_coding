<?php
	session_start();

	$serveraddress = '192.168.2.18'; // local IP address for WAMP
	$dbname = 'newsletter';
	$username = 'newsletteruser';
	$password = 'password';
	$dbconnect = ''; // allows global access to this variable

	try {
		$dbconnect = new PDO("mysql:host=$serveraddress; dbname=$dbname", $username, $password);
	} catch(PDOException $e) {
		echo "Connection Error: " . $e->getMessage();
	}

	$stmt = $dbconnect->prepare("SELECT first,last,email FROM people WHERE last = 'doe'");
	$stmt->execute();

	// $results is an array
	$results = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<td>First Name</td>
			<td>Last Name</td>
			<td>Email Address</td>
		</tr>
		<?php
			foreach($results as $user) {
				echo "
					<tr>
						<td>" . $user['first'] . "</td>
						<td>" . $user['last'] . "</td>
						<td>" . $user['email'] . "</td>
					</tr>
				";
			}
		?>
	</table>

</body>
</html>
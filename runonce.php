<?php
	if(false) {
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

		// Setup the newsletter table
		$sql = "CREATE TABLE people(
			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			first VARCHAR(30) NOT NULL,
			last VARCHAR(30) NOT NULL,
			email VARCHAR(50) NOT NULL,
			reg_date TIMESTAMP NOT NULL
		)";

		try {
			$dbconnect->exec($sql);
			echo 'success';
		} catch(PDOException $e) {
			echo "Error:".$e->getMessage();
		}
	} else {
		echo "This has already been run!";
	}
?>
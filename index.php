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
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<title></title>
</head>
<body>
	<h1>Tutorial 1: How to pass a variable to PHP from the URL.</h1>
	<p>Let's try the url: ...\?name=Michal</p>
	<?php
		// $_GET is an array of all the variables in the URL
		if(isset($_GET['name'])) {
			$name = $_GET['name'];
			echo "Hello $name!";
		} elseif(isset($_GET['birthday']) && $_GET['birthday'] == 'today') {
			echo "Happy Birthday $name!";
		} else {
			$name ="Guest";
			echo "Hello $name!";
		}

		function sanitize($string) {
			$string = htmlspecialchars($string);
			$string = stripcslashes($string);
			return $string;
		}

		function handler($first_name, $last_name, $email, $dbconnect) {
			// setcookie('newletter_signup_first_name', $first_name, time() + 86400); //86400 seconds = 1 day

			$sql = "INSERT INTO people(first, last, email) VALUES ('$first_name', '$last_name', '$email')";

			try {
				$dbconnect->exec($sql);
			} catch(PDOException $e) {
				echo "Database Error: ".$e->getMessage;
			}

			$_SESSION['subscribe_form_first_name'] = $first_name;
			header("Location: http://localhost/project-1/thanks.php");
		}

		$errors = [];
		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$error = false;

			$first_name = sanitize($_POST['first_name']);
			$last_name = sanitize($_POST['last_name']);
			$email = sanitize($_POST['email']);

			if(!ctype_alnum($first_name) || !ctype_alnum($last_name)) {
				$error = true;
				$errors['name'] = "The first and last name must be alphanumeric.";
			}	

			if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$error = true;
				$errors['email'] = "Please provide a valid email address.";
			}

			if(!$error) {
				handler($first_name, $last_name, $email, $dbconnect);
			}
		}
	?>

	<h1>Forms &amp; Validations</h1>
	<!-- $_SERVER is a super global -> PHP-SELF is the URL portion after the server address -->
	<!-- htmlspecialchars is a cleanser to ensure special characters don't inject code -->
	<form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method='post'>
		<input type='text' name='first_name' placeholder="First Name"><br>
		<input type='text' name='last_name' placeholder="Last Name"><br>
		<input type='text' name='email' placeholder="Email"><br>
		<?php
			if(isset($error) && $error) {
				foreach($errors as $key=>$value) {
					echo "$value<br>";
				}
			}
		?>

		<input type="submit">
	</form>
</body>
</html>
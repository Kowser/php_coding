<?php
	if (isset($_SESSION['REQUEST_METHOD']) && $_SESSION['REQUEST_METHOD'] === 'POST') {
		die('ERROR: Post requests not allowed');
	} // don't need else as it will just end the PHP code here, but if we want PHP to continue, we would remove this code

	// We are defining our own custom named Exception
	class POSTRequestWarningException extends Exception {
		public function __construct() {
			parent::__construct('The use of post requests to this page are not advised.');
		}
	}

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Thank You Page</title>
</head>
<body>
	<?php
		if(isset($_SESSION['subscribe_form_first_name'])) {
			$first_name = $_SESSION['subscribe_form_first_name'];
			echo "<h1>Thanks for joining our newsletters, $first_name !</h1>";
			// setcookie('subscribe_form_first_name', null, time() - 1);

			$_SESSION['subscribe_form_first_name'] = null;
		}

		// Exceptions are classes
		try {
			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				throw new POSTRequestWarningException();
			}
		} catch (POSTRequestWarningException $e) {
			echo "<h3" . $e->getMessage() . "</h3>";
		} catch (Exception $e) {
			// do nothing
		}
	?>
	
</body>
</html>

<!-- ends session and destroys all session data -->
<?php
	session_unset();
	session_destroy();
?>
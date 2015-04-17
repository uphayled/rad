<?php

	/*define('DB_USER', 'root');
	define('DB_PASSWORD', '');
	define('DB_HOST', 'localhost');
	define('DB_NAME', '');
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error()); 
	mysql_select_db(DB_NAME) or die(mysql_error());*/
	
	require 'credentials.php';
	require 'header.php';
	
	$nameentered = true;
	$passentered = true;
	$unset = false;
	$match = true;
	
	if (isset($_POST["submit"]))
		{
			if (!empty($name))
				$nameentered = true;
			if (!empty($pass))
				$passentered = true;
				
			$name = $_POST["name"];
			$pass = $_POST["pass"];
			$pass = md5($pass);
			$result = mysql_query("SELECT UserID, Pass FROM customers WHERE UserID = '$name' AND Pass = '$pass'") or die(mysql_error());
			$row = mysql_num_rows($result);
			if ($row != 0)
			{
				$hour = time() + 3600;
				setcookie("id", $name, $hour);
				setcookie("pass", $pass, $hour);
				header("Location: index.php");
			}
			else
				$match = false;
		}
		else
			$unset = true;
			

?>

	<div id="main">
		<h2>Login/Register</h2>
		<div id="login">
			<p>Existing user:</p> 
			<form action="login.php" method="POST">
				Username: <input type = "text" name = "name" id = "name"/><br>
				Password: <input type = "password" name = "pass" id = "pass"/><br>
				<input type = "submit" value = "submit" name = "submit"/><br>
			</form>
			<?php
			if (!$nameentered)
				echo "Please enter a username! <br>";
			if (!$passentered)
				echo "Please enter a password! <br>";
			if (!$match)
				echo "Invalid username or password! <br>";
			?>
		</div>
		<a href="register.php">Register now (and get free Danny Hugs)!</a>
	</div>
	<footer>
		4No2Go Pizza and Pasta, website designed for Michael Cooney, John Abbott College Computer Science's Database I, Autumn 2014 semester
	</footer>
</body>
</html>

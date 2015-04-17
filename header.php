<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>Rad Pizza</title>
</head>
<body>
	<header id="title">
		<h1>Rad Pizza</h1>
		<u><h3>Gotta Lotta Rad Pizza!</h3></u>
	<table id="links">
	<tr>
		<td><a href="index.php" class="reflink">Home</a></td>		
		<td><?php 
			switch($_COOKIE)
			{
				case 'owner': echo "<a href='omenu.php' class='reflink'>OMENU";
				break;
				default: echo "<a href='cmenu.php' class='reflink'>CMENU";
				break;
			}
		?></td>
		<td><a href="support.php" class="reflink">Support</a></td>
		<td><a href="about.php" class="reflink">About Us</a></td>
		<?php
			if (!empty($_COOKIE['id']) && !empty($_COOKIE['pass']))
				echo "<td><a href='logout.php' class='reflink'>Log Out</a></td>";
			else
				echo "<td><a href='login.php' class='reflink'>Login/Register</a></td>";
		?>
	</tr>
	</table>
	</header>

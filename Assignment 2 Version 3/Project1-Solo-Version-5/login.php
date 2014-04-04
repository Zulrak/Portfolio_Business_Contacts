<!--
File Name: login.php
Author Name: Jordan Cooper
Website Name: index.HTML
Description: This code runs when the user clicks submit 
			 it searches the database for a perfect match 
			 if a match is returned, allow the user to access the site
			 else return them to the homepage.
 -->
<!DOCTYPE html>
<html>
<head>
<title>Jordan Cooper's Digital Portfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css" />
<link rel="stylesheet" href="css/themes/portfolio.css" />
<link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Della+Respira">
    <style>
      body {
        font-family: 'Della Respira', serif;
      }
    </style>
<link rel="stylesheet" href="css/styles.css" />
<script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script>
<script src="js/slider.js"></script>
</head>
	<body>
		<?php 
		
			// define username and password from text entered in login.html posts
			$username = $_POST['username'];
			$password = $_POST['password'];
			// connect to the database
			mysql_connect("localhost", "admin", "password") or die(mysql_error()); 
			mysql_select_db("portfolio_site") or die(mysql_error()); 
			
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			
			$sql="SELECT * FROM user_login WHERE username='$username' and password='$password'";
			$result=mysql_query($sql);
			
			// Mysql_num_row is counting table row, there should only be 1 because it is an exact match.
			$count=mysql_num_rows($result);
			
			// If result matched $username and $password, table row must be 1 row
			if($count==1)
			{
				session_start();
				$_SESSION['session_user']=$username;		
				echo "<script type='text/javascript'>
				window.location.href='contact_info.php'</script>";
			}
			else 
			{
				$message = "ERROR! incorrect username or password.";
				echo "<script type='text/javascript'>window.alert('$message');
				window.location.href='index.html#home'</script>";

			}
		?>
	</body>
</html>
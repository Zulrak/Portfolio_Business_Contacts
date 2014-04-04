<!--
File Name: contact_info.php
Author Name: Jordan Cooper
Website Name: index.HTML
Description: This page is run after the user has successfully loggedin to the site
			 the user is then able to view the contact info in its entirety
 -->

	<?php
		session_start();
		if(!isset($_SESSION['session_user'])){
		echo "<script type='text/javascript'>
				window.location.href='index.html#home'</script>";
		} else {
	?>


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

<!-- Page 6 "Log In" page  -->
<div data-role="page" id="login"> 
	
	<!-- Header -->
	<div data-role="header"> <a href="#"  class="ui-btn ui-icon-arrow-l ui-btn-icon-notext ui-corner-all" data-rel=back ></a>
		<h1>Log In</h1>
	</div>
	<!-- Navigation -->
	<div data-role="navbar">
		<ul>
			<li><a href="#home"    data-icon="home">Home</a></li>
			<li><a href="#aboutMe" data-icon="info">About Me</a></li>
			<li><a href="#contact" data-icon="star">Contact</a></li>
			<li><a href="#login" data-icon="star">My Contacts</a></li>
		</ul>
	</div>
	<!-- Content -->
	<section role="main" class="ui-content centerText">

		<div id="logout">
			<a href="logout.php" rel="external" id="logoutBtn" >Log Out</a>
		</div>
			 <table border="1px" id="contactTable">
					<thead>
						<tr>
							<td>Name</td>
						</tr>
					</thead>
					<tbody>
					<?php
						$connect = mysql_connect("localhost","admin", "password");
						if (!$connect) {
							die(mysql_error());
						}
						mysql_select_db("portfolio_site");
						$sql="SELECT name,company,replace(replace(replace(replace(phoneNumber,' ',''),'(',''),')',''),'-','') as replacePhoneNumber,phoneNumber,address FROM contact_info ORDER BY name ASC";
						$result=mysql_query($sql);
						while($row = mysql_fetch_array($result)) {
						?>
							<tr>
								<td><a href="#popup" data-rel="popup"> <?php echo $row['name']?></a> </td>
							</tr>
							<div data-role="popup" id="popup">
								<p>Name: <?php echo $row['name']?></p>
								<p>Company: <?php echo $row['company'] ?></p>
								<p><a href="tel:<?php echo $row['replacePhoneNumber'] ?>"  rel="external" >Phone Number: <?php echo $row['phoneNumber'] ?></a></p>
								<p>Address: <?php echo $row['address'] ?></p>
							</div>
						<?php
						}
						?>
						</tbody>
						</table>
			</div>
				<?php
					}
				?>
	</section>
	<!-- Footer -->
	<div data-role="footer" data-position="fixed" id="footer">
		<h4> Copyright Jordan Cooper 2014</h4>
	</div>
</div>
<!-- End of Page 6 -->

</body>
</html>


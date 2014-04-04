<!--
File Name: contact_info.php
Author Name: Jordan Cooper
Website Name: home.HTML
Description: This page is run after the user has successfully loggedin to the site
			 the user is then able to view the contact info in its entirety
 -->
	<?php
		session_start();
		if(!isset($_SESSION['session_user'])){
		header("location:login.html");
		} else {
	?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Jordan Cooper | Contacts</title>
<link rel="stylesheet" href="css/foundation.css" />
<link rel="stylesheet" href="css/styles.css" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Della+Respira">
<style>
body {
	font-family: 'Della Respira', serif;
}
</style>
<script src="js/modernizr.js"></script>
<script type ="text/javascript">
if (screen.width < 800)
{
	window.location="http://webdesign4.georgianc.on.ca/~200199215/Mobile_Portfolio/index.html"
}
</script>
</head>
<body>

<!-- Navigation Bar  NOTE: id="current-page" changes from page to page, highlights the current page--> 
<!-- as the view port shrinks so does the navagation bar, to compensate for this all items are placed in 
		a drop down menu (except for the home page) when the viewport becomes too small to hold all the text -->
<div class="row">
	<nav class="top-bar" data-topbar>
		<ul class="title-area">
			<li class="name">
				<h1 id="current-page"><a href="home.html">Home</a></h1>
			</li>
			<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
		</ul>
		<section class="top-bar-section">
			<ul class="left">
				<li><a href="about.html">About Me</li>
				<li><a href="projects.html">Projects</a></li>
				<li><a href="services.html">Services</a></li>
				<li><a href="https://github.com/Zulrak">GitHub</a></li>
				<li><a href="contacts.html">Contact Me</a></li>
				<li><a href="contact_info.php" id="current-page">Business Contacts</a></li>
			</ul>
		</section>
	</nav>
</div>
<div class="row">
	<div id="logout" class="large-12 columns">
		<a href="logout.php" id="logoutBtn" >Log Out</a>
	</div>
</div>

<div id="table" align="center">
 <table border="1px">
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
			$sql="SELECT * FROM contact_info ORDER BY name ASC";
			$result=mysql_query($sql);
            while($row = mysql_fetch_array($result)) {
            ?>
                <tr>
                    <td onClick="alert('Name: <?php echo $row['name']?>'+'\n'+
					                   'Company: <?php echo $row['company'] ?>'+'\n'+
									   'Phone Number: <?php echo $row['phoneNumber'] ?>'+'\n'+
									   'Address: <?php echo $row['address'] ?>' )"><?php echo $row['name']?></td>
                </tr>
            <?php
            }
            ?>
            </tbody>
            </table>
</div>
	<?php
		}
	?>
</body>
</html>
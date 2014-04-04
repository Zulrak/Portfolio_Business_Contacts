<!--
File Name: logout.php
Author Name: Jordan Cooper
Website Name: index.HTML
Description: This page is run when the user clicks Log Out. 
			 It starts the session, destroys the session and then 
			 redirects the user to the home page when completed.
 -->
<?php   
session_start(); //open the session
session_destroy(); //destroy the session
echo "<script type='text/javascript'>
				window.location.href='index.html#home'</script>";
exit();
?>
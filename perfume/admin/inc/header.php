<?php include "inc/cookie.php";

//--------------------- connect database
$connect = mysqli_connect('localhost','root','','efism',3308);




?>

<!DOCTYPE html>
<html>
<head>
	<title>control panel</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="inc/ckeditor/ckeditor.js"></script>
</head>
<body>
    <div class="all">
    	
    	<!----------------------------- Admin Menu --------------------->
<center>
       <div class="adminMenu">
                <ul>
                     <li><a href="addcat.php">Add rating</a></li>
                     <li><a href="addpro.php">Add product</a></li>
                     <li><a href="info-clients.php">Info clients</a></li>
                </ul>

       </div>
</center>
       
       <br>
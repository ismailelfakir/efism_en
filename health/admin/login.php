<?php 

//----------------------connect database  ---------


$connect = mysqli_connect('localhost','root','','efism',3308);

//------------------------------- post value------------
$name_ad_health = @$_POST['name_ad_health'];
$password_ad_health = @$_POST['password_ad_health'];

if(isset($_POST['login'])){

    if(empty($name_ad_health) or empty($password_ad_health)){

    	echo '<script> alert("please enter your data");</script>';
    }
    else{

    	//-------------------- get admin name and pass ---------------
          $get_admin = "select *from ad_health where name_ad_health='$name_ad_health' AND password_ad_health='$password_ad_health'";
          $run_admin =  mysqli_query($connect ,$get_admin);

          //------------------------ admin isset ---------------
          if (mysqli_num_rows($run_admin)==1) {
          	
          	$row_admin = mysqli_fetch_array($run_admin);

          	//-------------admin value isset ------
          	$aname = $row_admin['name_ad_health'];

          	//--------- cookie here ----------
          	setcookie("aname",$aname,time()+60*60*24);
           	setcookie("adminlogin",1,time()+60*60*24);
            
             echo '<script> alert("welcome again Boss");</script>';

            header("Location: ok.php");



          }

         else{
         	echo '<script> alert("data incorrect ");</script>';
         }
    }

}

?>


<!DOCTYPE html >
<head>
  <title>log in to control panel</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style.css">

</head>


<body>
	<div class="loginAll">
		<form action="login.php" method="post" >
			<input type="text" name="name_ad_health" placeholder="user"><br>
			<input type="password" name="password_ad_health" placeholder="password"><br>
			<input type="submit" name="login" value="Log in">
		</form>


	</div>
</body>	
</html>
    
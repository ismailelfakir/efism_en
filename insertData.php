

<?php 
include 'inc/db.php';
include 'inc/function.php';   
//------------------------------ post values ----------------------

$fullName_in_cus = @$_POST['fullName_in_cus'];
$email_in_cus = @$_POST['email_in_cus'];
$ip_in_cus = getIp();


if (isset($_POST['finish'])) {
  

    $insert_info_c = "insert into interested_customers 
                                (fullName_in_cus,
                                  email_in_cus,
                                  ip_in_cus)
                          values ('$fullName_in_cus',
                                  '$email_in_cus',
                                  '$ip_in_cus')"     ;

    $run_info_c = mysqli_query($connect , $insert_info_c);     
    
    if (isset($run_info_c)) {

        header("location: index.php");
                   
   // echo "data saved successfully";  

        }else {
          echo "try again";
        }  
  }

?>



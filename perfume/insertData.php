

<?php 
include 'inc/function.php';   

//------------------------------ post values ----------------------

$fullNameCl = @$_POST['fullNameCl'];
$emailCl = @$_POST['emailCl'];
$cityCl = @$_POST['cityCl'];
$ipCl = getIp();


if (isset($_POST['finish'])) {
  

    $insert_info_c = "insert into info_client_p (fullNameCl,emailCl,cityCl,ipCl)
                          values ('$fullNameCl',
                                  '$emailCl',
                                  '$cityCl',
                                  '$ipCl')"     ;

    $run_info_c = mysqli_query($connect , $insert_info_c);     
    
    if (isset($run_info_c)) {

        header("location: https://wa.me/+212649277864");
                   
   // echo "data saved successfully";  

        }else {
          echo "try again";
        }  
  }

?>



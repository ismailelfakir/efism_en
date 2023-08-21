<?php 

$connect = mysqli_connect('localhost','root','','efism');

mysqli_set_charset($connect, "utf8");




function getInfoCl(){
	global $connect ;

$get_info_Cl = "select * from interested_customers ";

    $run_info_Cl = mysqli_query($connect , $get_info_Cl);

  while($row_info_Cl = mysqli_fetch_array($run_info_Cl)) {
    	
    	echo '
    	<tr>
             <td> '.$row_info_Cl['fullName_in_cus'].'</td>
             <td>'. $row_info_Cl['email_in_cus'].'</td>
    	
         </tr>

 ';

    	    }  




}


















?>
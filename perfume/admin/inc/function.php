<?php 

$connect = mysqli_connect('localhost','root','','efism',3308);

mysqli_set_charset($connect, "utf8");




function getInfoCl(){
	global $connect ;

$get_info_Cl = "select * from info_client_p ";

    $run_info_Cl = mysqli_query($connect , $get_info_Cl);

  while($row_info_Cl = mysqli_fetch_array($run_info_Cl)) {
    	
    	echo '
    	<tr>
             <td> '.$row_info_Cl['fullNameCl'].'</td>
             <td>'. $row_info_Cl['emailCl'].'</td>
             <td>'. $row_info_Cl['cityCl'].'</td>
    	
         </tr>

 ';

    	    }  




}


















?>
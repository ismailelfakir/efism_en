<?php

$connect = mysqli_connect('localhost','root','','efism');

mysqli_set_charset($connect, "utf8");

// ---------------- get ip -------------

function getIp(){

   $ip = '';
    if (isset($_SERVER['HTTP_CLIENT_IP'])) 
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    else if (isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ip = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ip = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ip = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ip = $_SERVER['REMOTE_ADDR'];
    else
        $ip = 'UNKNOWN';
    return $ip ;

}


//--------------------- get category  -----

function get_cat (){

	global $connect ;

	$get_cat = "select * from category ";

	$run_cat = mysqli_query($connect , $get_cat);

	while ($row_cat = mysqli_fetch_array($run_cat) ) {
		
		 echo '<li class="sub-item"><a href="'.$row_cat['c_name'].'/index.php">'.$row_cat['c_name'].'</a></li>';
	}
}

/*

//------------------- get product --------

function get_pro(){
	
	global $connect ;

	if (!isset($_GET['cat'])) {
		
	$get_pro = "select * from abonnement";

	$run_pro = mysqli_query($connect , $get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {

        $pc=(int)(100-($row_pro['priceA']*100)/$row_pro['priceAC']);//pourcentage of price
		
		echo '

            <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro['idA'].'"><img src="img/'.$row_pro['imgA'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro['idA'].'">'.$row_pro['titleA'].'</a>
                    </div>
                    <div class="pro-stars">
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                    </div>  
                    <div class="price ">
                         <div class="price_c "><s> '.$row_pro['priceAC'].' $</s></div>
                         <a href="details.php?id='.$row_pro['idA'].'"> '.$row_pro['priceA'].' $ </a>
                         <div class="p-p">-'.$pc.'%</div>
                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro['idA'].'"><button>Get Subscription</button></a></center>
                    </div>

                </div>
            </li>

         ';
	}
	}

}

//------------------------ get product by category ----------

function get_pro_cat(){

	global $connect;

	if(isset($_GET['cat'])){

		$cat = (int)$_GET['cat'];

		$get_pro_cat = "select * from abonnement where idA = '$cat'";

		$run_pro_cat = mysqli_query($connect , $get_pro_cat);

        if(mysqli_num_rows($run_pro_cat) > 0){

             while ($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {

                $pc_c=(int)(100-($row_pro_cat['priceA']*100)/$row_pro_cat['priceAC']);//pourcentage of price
             	
             	 echo '

            <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro_cat['idA'].'"><img src="img/'.$row_pro_cat['imgA'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro_cat['idA'].'">'.$row_pro_cat['titleA'].'</a>
                    </div>
                    <div class="pro-stars">
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                    </div>  
                    <div class="price ">
                        <div class="price_c "><s> '.$row_pro_cat['priceAC'].' $</s></div>
                         <a href="details.php?id='.$row_pro_cat['idA'].'"> '.$row_pro_cat['priceA'].' $ </a>
                         <div class="p-p">-'.$pc_c.'%</div>

                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro_cat['idA'].'"><button>Get Subscription</button></a></center>
                    </div>

                </div>
            </li>

         ';
             }

        }
        else{
        	echo ' <div class="error"> Sorry, this kind of products not exist now ... </div> ';
        }
	}

}

//------------------------------ get product by search ---------

function get_pro_search(){

    global $connect;

    if (isset($_GET['search'])) {
        
        $searchArea = $_GET['searchArea'];

        $get_pro_search = "select * from abonnement where keyWordA like '%$searchArea%'";

        $run_pro_search = mysqli_query($connect , $get_pro_search);

        if (mysqli_num_rows($run_pro_search) > 0) {
            
            while ($row_pro_search = mysqli_fetch_array($run_pro_search)) {

                $pc_s=(int)(100-($row_pro_search['priceA']*100)/$row_pro_search['priceAC']);//pourcentage of price
            
             echo '

             <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro_search['idA'].'"><img src="img/'.$row_pro_search['imgA'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro_search['idA'].'">'.$row_pro_search['titleA'].'</a>
                    </div>
                    <div class="pro-stars">
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                        <span class="fa fa-star cheked"></span>
                    </div>
                    <div class="price ">
                         <div class="price_c "><s> '.$row_pro_search['priceAC'].' $</s></div>
                         <a href="details.php?id='.$row_pro_search['idA'].'"> '.$row_pro_search['priceA'].' $ </a>
                         <div class="p-p">-'.$pc_s.'%</div>

                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro_search['idA'].'"><button>Get Subscription</button></a></center>
                    </div>

                </div>
            </li>

         ';
            }
        }
        else{
            echo '<div class="error"> Sorry, this kind of products not exist now ... </div>'  ;
        }


    }
}


*/



?>




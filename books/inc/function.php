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
        
         echo '<li class="sub-item"><a href="../'.$row_cat['c_name'].'/index.php">'.$row_cat['c_name'].'</a></li>';
    }
}

//--------------------- get category  of product-----

function get_cat_of_pro (){

    global $connect ;

    $get_cat = "select * from cat_books ";

    $run_cat = mysqli_query($connect , $get_cat);

    while ($row_cat = mysqli_fetch_array($run_cat) ) {
        
         echo '<li class="sub-item"><a href="index.php?cat='.$row_cat['id_cat_books'].'">'.$row_cat['name_cat_books'].'</a></li>';
    }
}

//------------------- get product --------

function get_pro(){
	
	global $connect ;

	if (!isset($_GET['cat'])) {
		
	$get_pro = "select * from product_books";

	$run_pro = mysqli_query($connect , $get_pro);

	while ($row_pro = mysqli_fetch_array($run_pro)) {

        $pc=(int)(100-($row_pro['price_p_b']*100)/$row_pro['price_p_b_c']);//pourcentage of price
		
		echo '

            <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro['id_p_b'].'"><img src="admin/img/'.$row_pro['img_p_b'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro['id_p_b'].'">'.$row_pro['title_p_b'].'
                        (<span class="fa fa-star cheked"></span>'.$row_pro['stars_p_b'].'/5 )
                        </a>
                    </div> 
                    <div class="price ">
                         <div class="price_c "><s> '.$row_pro['price_p_b_c'].' DH</s></div>
                         <a href="details.php?id='.$row_pro['id_p_b'].'"> '.$row_pro['price_p_b'].' DH</a>
                         <div class="p-p">-'.$pc.'%</div>
                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro['id_p_b'].'"><button>Get Product Now</button></a></center>
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

		$get_pro_cat = "select * from product_books where id_p_b = '$cat'";

		$run_pro_cat = mysqli_query($connect , $get_pro_cat);

        if(mysqli_num_rows($run_pro_cat) > 0){

             while ($row_pro_cat = mysqli_fetch_array($run_pro_cat)) {

                $pc_c=(int)(100-($row_pro_cat['price_p_b']*100)/$row_pro_cat['price_p_b_c']);//pourcentage of price
             	
             	 echo '

            <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro_cat['id_p_b'].'"><img src="admin/img/'.$row_pro_cat['img_p_b'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro_cat['id_p_b'].'">'.$row_pro_cat['title_p_b'].'
                        (<span class="fa fa-star cheked"></span>'.$row_pro_cat['stars_p_b'].'/5 )
                        </a>
                    </div>
                    <div class="price ">
                        <div class="price_c "><s> '.$row_pro_cat['price_p_b_c'].' DH</s></div>
                         <a href="details.php?id='.$row_pro_cat['id_p_b'].'"> '.$row_pro_cat['price_p_b'].' DH</a>
                         <div class="p-p">-'.$pc_c.'%</div>

                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro_cat['id_p_b'].'"><button>Get Product Now</button></a></center>
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

        $get_pro_search = "select * from product_books where keyWord_p_b like '%$searchArea%'";

        $run_pro_search = mysqli_query($connect , $get_pro_search);

        if (mysqli_num_rows($run_pro_search) > 0) {
            
            while ($row_pro_search = mysqli_fetch_array($run_pro_search)) {

                $pc_s=(int)(100-($row_pro_search['price_p_b']*100)/$row_pro_search['price_p_b_c']);//pourcentage of price
            
             echo '

             <li>
                <div class="product">
                    <div id="pro_img">
                        <a href="details.php?id='.$row_pro_search['id_p_b'].'"><img src="admin/img/'.$row_pro_search['img_p_b'].'" "></a>
                    </div>
                    <div id="pro_title">
                        <a href="details.php?id='.$row_pro_search['id_p_b'].'">'.$row_pro_search['title_p_b'].'
                        (<span class="fa fa-star cheked"></span>'.$row_pro_search['stars_p_b'].'/5 )
                        </a>
                    </div>
                    <div class="price ">
                         <div class="price_c "><s> '.$row_pro_search['price_p_b_c'].' DH</s></div>
                         <a href="details.php?id='.$row_pro_search['id_p_b'].'"> '.$row_pro_search['price_p_b'].' DH</a>
                         <div class="p-p">-'.$pc_s.'%</div>

                    </div>
                    <div id="pro_bay">
                        <center><a href="details.php?id='.$row_pro_search['id_p_b'].'"><button>Get Product Now</button></a></center>
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





?>




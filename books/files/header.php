<?php 

   include"inc/function.php";
$user_coo = @$_COOKIE['user'];
   $login_coo = @$_COOKIE['login'];
   
?>
<!DOCTYPE html>
<html>
<head>
  <title>Efism - Books | Best books and novels</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width , initial-scale=1.0" >
  <meta http-equiv="X-UA-Compatible" content="ie=edge" >
  <meta name="facebook-domain-verification" content="9mzaniodogw6ocshfw59j78qj8ojms" />
     

     <link rel="shortcut icon" type="image/png" href="img/favicon.png">
     <!-- custom css files link -->
     <link rel="stylesheet" type="text/css" href="css/style.css">
     <!-- font awesome cdn link -->
     <link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">


     <!-- custom script files link -->
     <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1413090661966219"
     crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" charset="utf-8"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  
 
</head>
<body>
  <!-------------------------------- header start-------------->
  <!-- header section start -->
   
   <header class="header">
        <a href="../index.php" class="logo">
             <img src="img/logoSiteWeb.png">
        </a>

     <div class="navigation">

            <ul class="menu">

                 <div class="close-btn"><i class="fas fa-close fa-2x"></i></div>

               <div class="search-form back-s">
                 <form class="back-s" action="search.php" method="get">
                    <input class="back-s" type="text" name="searchArea" placeholder="Search...">
                    <button class="search_btn back-s" name="search">  
                    <i class="fa fa-search back-s" aria-hidden="true"></i>
                    </button>
                 </form>
               </div>   

                 <li class="menu-item"><a class="s-main" href="../index.php">Main</a></li>
                 <li class="menu-item">
                    <a class="sub-bnt" href="#">Category <i class="fas fa-angle-down"></i></a>
                    <ul class="sub-menu" >
                         <?php get_cat(); ?>
                    </ul>
                 </li>
                 <li class="menu-item">
                    <a class="sub-bnt" href="#">Products for <i class="fas fa-angle-down"></i></a>
                    <ul class="sub-menu" >
                         <?php get_cat_of_pro(); ?>
                    </ul>
                 </li>
                 <li class="menu-item"><a href="https://wa.me/+212679065886">Contact Us</a></li>

                 <div class="icons-contact">  
                    <div class="h-s-icons">
                        <h5>Follow us</h5>
                        <div class="social-links">
                          <a href="https://www.instagram.com/efismstore/" target="_blank" ><i class="fa-brands fa-instagram" aria-hidden="true"></i></a>
                          <a href="https://www.tiktok.com/@efism" target="_blank"><i class="fa-brands fa-tiktok" aria-hidden="true"></i></a>
                          <a href="https://web.facebook.com/efismstore" target="_blank"><i class="fa-brands fa-facebook-f" aria-hidden="true"></i></a>
                        </div>
                    
                     </div>
                     <div class="h-s-icons">
                        <h5>Contact us</h5>
                        <div class="social-links">
                            <a href="mailto:contact-us@efism.com" target="_blank"><i class="fa-solid fa-envelope" aria-hidden="true"></i></a>
                            <a href="https://wa.me/+212679065886" target="_blank"><i class="fa-brands fa-whatsapp" aria-hidden="true"></i></a>
                            <a href="https://t.me/efismofficial" target="_blank"><i class="fa-brands fa-telegram" aria-hidden="true"></i></a>
                        </div>
                    
                     </div>
               </div>
               <div class="copyright"><b>EFISM &copy 2022</b></div>
            </ul>
            
        </div>

        <div class="search-form back-s">
               <form class="back-s" action="search.php" method="get">
                    <input class="back-s" type="text" name="searchArea" placeholder="Search...">
                    <button class="search_btn back-s" name="search">  
                    <i class="fa fa-search back-s" aria-hidden="true"></i>
                    </button>
               </form>
        
        </div>

  <div class="menu-btn"><i class="fa fa-bars fa-2x"></i></div>

   </header>

   <script type="text/javascript">
       // jquery for toggle drop down
   $(document).ready(function(){

         $(".sub-bnt").click(function(){
             $(this).next(".sub-menu").slideToggle();
         });

   });

   // javascript for menu 

   var menu = document.querySelector(".menu");
   var menuBtn = document.querySelector(".menu-btn");
   var closeBtn = document.querySelector(".close-btn");
   


   menuBtn.addEventListener("click" , () => {
        menu.classList.add("active");
   });

   closeBtn.addEventListener("click" , () => {
        menu.classList.remove("active");
   });

   </script>
   

  <!---------------------------------------------- header end---------------------------------------------------->


    
  <br/>

  <div class="social-links-home-whatssap">
        <a href="https://wa.me/+212679065886" target="_blank"><i class="fa-brands fa-whatsapp fa-2x" aria-hidden="true"></i></a>
  </div>
    <!-------------------------------------------------------- content start  -------------------->        

<div class="content ">
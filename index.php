<?php include"files/header.php"?>


<div class="social-links-home-whatssap"><a href="https://wa.me/+212679065886" target="_blank"><i class="fa-brands fa-whatsapp fa-2x" aria-hidden="true"></i></a></div>

   <div class="about-us-home"><h1>Welcome to EFISM Store </h1></div>
	

  <div class="panle-home panle-home-flex w-p-details">
       
       <div class="cat-home-name color-1">Visit your category</div>

       <div class="cat-home-all">
        <a class="a-cat-home box-shadow" href="health/index.php">
          <div class="cat-home  back-3">
               <div class="title-cat-home">Health</div>
               <div class="icons-cat-home">
                    
                    <i class="fa-solid fa-house-medical fa-2x"></i>
                    <i class="fa-solid fa-heart-pulse fa-2x"></i>
               
               </div>
               <div class="visit-cat-home">Visit <i class="fa-solid fa-arrow-right"></i></div>
          </div>
        </a>

        <a class="a-cat-home box-shadow" href="books/index.php">

          <div class="cat-home back-3">
               <div class="title-cat-home">Books</div>
               <div class="icons-cat-home">
                    
                    <i class="fa-solid fa-book fa-2x"></i>
                    <i class="fa-solid fa-book-open-reader fa-2x"></i>    
                               
               </div>
               <div class="visit-cat-home">Visit <i class="fa-solid fa-arrow-right"></i></div>
          </div>
        </a>

        <a class="a-cat-home box-shadow" href="perfume/index.php">
          <div class="cat-home  back-3">
               <div class="title-cat-home">Perfumes</div>
               <div class="icons-cat-home">
                    
                    <i class="fa-solid fa-spray-can-sparkles fa-2x"></i>
                    <i class="fa-solid fa-heart fa-2x"></i>
                    
               </div>
               <div class="visit-cat-home">Visit <i class="fa-solid fa-arrow-right"></i></div>
          </div>
         </a>
      </div>
     </div>
   
<!--
     <div class="panle-home panle-home-flex w-p-details">
       
       <div class="cat-home-name color-1">Visit your category</div>

       <div class="cat-home-all">
        <a class="" href="health/index.php">
          <div class="cat-home box-shadow back-3">
               <div class="title-cat-home"><a class="color-1" href="health/index.php">Health</a></div>
               <div class="icons-cat-home">
                    <a class="color-1" href="health/index.php">
                    <i class="fa-solid fa-house-medical fa-2x"></i>
                    <i class="fa-solid fa-heart-pulse fa-2x"></i>
               </a>
               </div>
               <div class="visit-cat-home"><a class="color-3" href="health/index.php">Visit <i class="fa-solid fa-arrow-right"></i></a></div>
          </div>
        </a>

        <a class="" href="books/index.php">

          <div class="cat-home box-shadow back-3">
               <div class="title-cat-home"><a class="color-1" href="books/index.php">Books</a></div>
               <div class="icons-cat-home">
                    <a class="color-1" href="books/index.php">
                    <i class="fa-solid fa-book fa-2x"></i>
                    <i class="fa-solid fa-book-open-reader fa-2x"></i>    
                    </a>           
               </div>
               <div class="visit-cat-home"><a class="color-3" href="books/index.php">Visit <i class="fa-solid fa-arrow-right"></i></a></div>
          </div>
        </a>

        <a class="" href="perfume/index.php">
          <div class="cat-home box-shadow back-3">
               <div class="title-cat-home"><a class="color-1" href="perfume/index.php">Perfumes</a></div>
               <div class="icons-cat-home">
                    <a class="color-1" href="perfume/index.php">
                    <i class="fa-solid fa-spray-can-sparkles fa-2x"></i>
                    <i class="fa-solid fa-heart fa-2x"></i>
                    </a>
               </div>
               <div class="visit-cat-home"><a class="color-3" href="perfume/index.php">Visit <i class="fa-solid fa-arrow-right"></i></a></div>
          </div>
         </a>
      </div>
     </div>                                                                                                                                                          -->
      <div class="panle-home w-p-details box-shadow">
          <div class="msg-home">Enter your email for get more products and informations to make your life good<br>
          and take advantage of discounts on products that suit you</div>

          <div class="sub-home">

          <form id="form" class="form" action="insertData.php" method="post">
                    <div class="panle_body ">
           <div class="lable">Full name : </div>
           <input type="text" id="fullName_in_cus" name="fullName_in_cus" placeholder="full name" >
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>
      

        <div class="panle_body">
           <div class="lable">Email : </div>
           <input type="text" id="email_in_cus" name="email_in_cus" placeholder="example@gmail.com">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>

        <div class="panle_body">
           <center><input class="butt" type="submit" id="finish" name="finish" value="Confirm"></center>
          
        </div>

          </form>
          </div>

     </div>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          


<div class="c"></div>

<!----------------------------------------- js for validation of form -------------------->

<script >
  
  const form = document.getElementById('form');
  const fullName_in_cus = document.getElementById('fullName_in_cus');
  const email_in_cus = document.getElementById('email_in_cus');


form.addEventListener('submit',(e)=>{

  var data = $('#form').serialize()+'$finish=finish';
    if(checkInputs()==true){
      $.ajax({
        type:"POST",
        url:"insertData.php",
        data: data,
        success: function(data){
          $('#mesg');
        }
      });

    }else{
      e.preventDefault();
    }
    
     
});   
  
function checkInputs(){
  //get the values from inputs
  const ifnameValue = fullName_in_cus.value.trim();
  const iemailValue = email_in_cus.value.trim();

  var p = 0;

// --------------- test firstname && name  ---------------
  if (ifnameValue =='') {
    //show error 
    //add error class
    setErrFor(fullName_in_cus,'please enter your name');
  }else{
    //add success class 
    setSuccessFor(fullName_in_cus);
    p=p+1;
  }

// --------------- test email ---------------
  if (iemailValue =='') {

    setErrFor(email_in_cus,'please enter your email');
  }else if (!isEmail(iemailValue)) {
    setErrFor(email_in_cus,'email is not valid');

  }else{
    setSuccessFor(email_in_cus);
    p=p+1;
  }

  if(p==2){
    return true;
  }else{
    return false;
  }
}

function setErrFor(input,message){

  const panleBody = input.parentElement; // .panle_body
  const small = panleBody.querySelector('small');

  //add eror message inside small
  small.innerText = message;

  //add error class
  panleBody.className = 'panle_body err';
}

function setSuccessFor(input){

  const panleBody = input.parentElement;

  panleBody.className = 'panle_body success';


}

function isEmail(email){
     
     return /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
}

</script>


<?php include"files/footer.php"?>









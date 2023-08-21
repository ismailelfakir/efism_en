<?php include "files/header.php" ; ?>

<?php 

$id_p_b = (int)$_GET['id'];

if (isset($_GET['id'])) {
  
  $get_pro_d = "select * from product_books where id_p_b = '$id_p_b'";

    $run_pro_d = mysqli_query($connect , $get_pro_d);

    $row_pro_d = mysqli_fetch_array($run_pro_d);

}

?>

<div class="panle box-shadow w-p-details">
  
     <div class="panle_title"><?php echo $row_pro_d['title_p_b']; ?></div>

     <img src="<?php echo 'admin/img/'.$row_pro_d['img_p_b'].''; ?>" width="100%" style="padding: 10px;" />

</div>

<div class="panle box-shadow w-p-details">
     
       <div class="panle_title">Product information</div>
      <div class="panle_body">
          <div id="p_info"><b>Customer Reviews :  </b> 
            <span class="fa fa-star cheked"></span> <?php echo $row_pro_d['stars_p_b']; ?>/5 
         </div> 
         <div id="p_info"><b>Price : <?php echo $row_pro_d['price_p_b']; ?> DH</b>  <s><?php echo $row_pro_d['price_p_b_c'];?> DH</s></div>
         <div id="p_info"><b>Category :</b> 
            <?php  
               $cat = $row_pro_d['cat_p_b'];

               $get_cat = "select * from cat_books where id_cat_books = '$cat'";

               $run_cat = mysqli_query($connect , $get_cat);

               $row_cat = mysqli_fetch_array($run_cat);

               echo $row_cat['name_cat_books'];
          ?>
         </div>   
         <div id="p_info"><b>Descrption : </b><br>
               <?php echo $row_pro_d['desc_p_b']; ?>
         </div>
           
      </div>

</div>
<div class="panle box-shadow w-p-details">

  <div class="panle_title">Get your product now</div>

   <form id="form" class="form" action="insertData.php" method="post">

    
  
    <div class="panle-info "style="width: 100% ; margin: 0px auto ;"> 
        
        <div class="panle_body ">
           <div class="lable">Full name : </div>
           <input type="text" id="fullNameCl" name="fullNameCl" placeholder="full name" >
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>
      

        <div class="panle_body">
           <div class="lable">Email : </div>
           <input type="text" id="emailCl" name="emailCl" placeholder="example@gmail.com">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>
        
        <div class="panle_body">
           <div class="lable">City : </div>
           <input type="text" id="cityCl" name="cityCl" placeholder="Casablanca">
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>


         <div class="panle_body">
           <center><input class="butt" type="submit" id="finish" name="finish" value="Confirm now"></center>
          
        </div>

     </div>
      <b id="mesg"></b>
</form>

<!----------------------------------------- end de test for -------------------->


</div>


<div class="c"></div>

<!----------------------------------------- js for validation of form -------------------->

<script >
  
  const form = document.getElementById('form');
  const fullNameCl = document.getElementById('fullNameCl');
  const emailCl = document.getElementById('emailCl');
  const cityCl = document.getElementById('cityCl');


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
  const ifnameValue = fullNameCl.value.trim();
  const iemailValue = emailCl.value.trim();
  const icityValue = cityCl.value.trim();

  var p = 0;

// --------------- test firstname && name  ---------------
  if (ifnameValue =='') {
    //show error 
    //add error class
    setErrFor(fullNameCl,'please enter your first name');
  }else{
    //add success class 
    setSuccessFor(fullNameCl);
    p=p+1;
  }

// --------------- test email ---------------
  if (iemailValue =='') {

    setErrFor(emailCl,'please enter your email');
  }else if (!isEmail(iemailValue)) {
    setErrFor(emailCl,'email is not valid');

  }else{
    setSuccessFor(emailCl);
    p=p+1;
  }

// --------------- test city ---------------
  if (icityValue =='') {

    setErrFor(cityCl,'please enter your city');
  }else{
    
    setSuccessFor(cityCl);
    p=p+1;
  }

  if(p==3){
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




<?php include "files/footer.php" ; ?>
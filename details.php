<?php include "files/header.php" ; ?>

<?php 

$p_id = (int)$_GET['id'];

if (isset($_GET['id'])) {
  
  $get_pro_d = "select * from abonnement where idA = '$p_id'";

    $run_pro_d = mysqli_query($connect , $get_pro_d);

    $row_pro_d = mysqli_fetch_array($run_pro_d);

}

?>

<div class="panle w-p-details">
  
     <div class="panle_title"><?php echo $row_pro_d['titleA']; ?></div>

     <img src="<?php echo 'img/'.$row_pro_d['imgA'].''; ?>" width="100%" style="padding: 3px;" />

      <div class="panle_title">Product information</div>
      <div class="panle_body">
          <div id="p_info"><b>Customer Reviews :</b> 
            <span class="fa fa-star cheked"></span>
            <span class="fa fa-star cheked"></span>
            <span class="fa fa-star cheked"></span>
            <span class="fa fa-star cheked"></span>
            <span class="fa fa-star cheked"></span>
         </div> 
         <div id="p_info"><b>Price : <?php echo $row_pro_d['priceA']; ?> $</b>  <s><?php echo $row_pro_d['priceAC'];?> $</s></div>
             <div id="p_info"><b>Reference :</b> 
              Crystal OTT
             </div>
             <div id="p_info"><b>Descrption : </b><br>
             - Crystal OTT offers you a very large playlist of full HD & SD channels and videos on demand, a high quality server with a very wide Load Balancing and Bandwidth.
             <br>
             - Crystal OTT offers you a world of +12,000 Channels in 4K, Full HD and HD with more than 44,000 unlimited Series and movies in all languages with regular updates.
           </div>
           <div id="p_info"> <b> Compatible with :</b>
            <br>
              - Smart TV (Samsung, LG, Sony, Phillips, TCL…etc)
              <br>
              - Android TV Box (X96mini, X96Q, H96Max, Mi Box, Amazon Fire Stick … etc)
              <br>
             - Mag
             <br>
             - Android/IOS smartphones
             <br>
             - Tablets/Ipads
             <br>
             - PC/Mac

          </div>
      </div>

</div>
<div class="panle w-p-details">

  <div class="panle_title">Get product</div>

   <form id="form" class="form" action="insertData.php" method="post">

    
  
    <div class="panle-info "style="width: 100% ; margin: 0px auto ;"> 
        
        <div class="panle_body ">
           <div class="lable">First name : </div>
           <input type="text" id="firstNameCl" name="firstNameCl" placeholder="first name" >
           <i class="fa fa-check-circle" aria-hidden="true"></i>
           <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
           <small>error message</small>
        </div>

        <div class="panle_body ">
           <div class="lable">Last name : </div>
           <input type="text" id="lastNameCl" name="lastNameCl" placeholder="last name">
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
           <center><input class="butt" type="submit" id="finish" name="finish" value="Get free trial"></center>
          <center><div class="or">or</div></center>
          
        </div>

     </div>
      <b id="mesg"></b>
</form>

<!----------------------------------------- end de test for -------------------->
         

<!-----------------------------------------  paypal buttons ---------------------->
       <form class="form-add-card" target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post" >
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="business" value="ielfakir49@gmail.com">
            <input type="hidden" name="lc" value="US">
            <input type="hidden" name="item_name" value="buy">
            <input type="hidden" name="amount" value="<?php echo $row_pro_d['priceA']; ?>">
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="button_subtype" value="products">
            <input type="hidden" name="no_note" value="0">
            <input type="hidden" name="add" value="1">
            <input type="hidden" name="bn" value="PP-ShopCartBF:btn_cart_LG.gif:NonHostedGuest">
          <center>  
            <input type="submit" class="butt-add-to-card" value="ADD TO CART" src="https://www.paypalobjects.com/en_US/i/btn/btn_cart_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"><br>
            <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="10" height="10">
          </center>
       </form>

       <div class="send-screen">Please send us the screenshot of the payment on <a href="https://wa.me/+212649277864">WhatsApp</a></div>


</div>


<div class="c"></div>

<script type="text/javascript">
  
  const form = document.getElementById('form');
  const firstNameCl = document.getElementById('firstNameCl');
  const lastNameCl = document.getElementById('lastNameCl');
  const emailCl = document.getElementById('emailCl');

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
  const ifnameValue = firstNameCl.value.trim();
  const inameValue = lastNameCl.value.trim();
  const iemailValue = emailCl.value.trim();

  var p = 0;

// --------------- test firstname && name  ---------------
  if (ifnameValue =='') {
    //show error 
    //add error class
    setErrFor(firstNameCl,'please enter your first name');
  }else{
    //add success class 
    setSuccessFor(firstNameCl);
    p=p+1;
  }

  if (inameValue =='') {

    setErrFor(lastNameCl,'please enter your last name');
  }else{
    
    setSuccessFor(lastNameCl);
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
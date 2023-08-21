<?php  include "inc/header.php";  ?>

<?php 

//------------------ post values -------


$cat_p_p = @$_POST['cat_p_p'];
$title_p_p = @$_POST['title_p_p'];
$title_p_p_fr = @$_POST['title_p_p_fr'];
$title_p_p_ar = @$_POST['title_p_p_ar'];
$img_p_p = @$_FILES['img_p_p']['name'];
$img_p_p_tmp = @$_FILES['img_p_p']['tmpname'];
$price_p_p = @$_POST['price_p_p'];
$price_p_p_c = @$_POST['price_p_p_c'];
$stars_p_p = @$_POST['stars_p_p'];
$desc_p_p = @$_POST['desc_p_p'];
$desc_p_p_fr = @$_POST['desc_p_p_fr'];
$desc_p_p_ar = @$_POST['desc_p_p_ar'];
$keyWord_p_p = @$_POST['keyWord_p_p'];



//------------------- move uplude img 

move_uploaded_file($img_p_p_tmp, "img/$img_p_p");


//---------------------- insert pro ---------------
if(isset($_POST['addpro'])){

    if (empty($cat_p_p) || empty($title_p_p) || empty($title_p_p_fr) || empty($title_p_p_ar) ||  empty($img_p_p) || empty($price_p_p) || empty($price_p_p_c) || empty($stars_p_p)|| empty($desc_p_p) || empty($desc_p_p_fr) || empty($desc_p_p_ar) ||empty($keyWord_p_p)) {
    	echo '<script> alert("please enter all data") </script> ';
    }

    else{

    	$insert_pro = "insert into product_perfume (cat_p_p,title_p_p,title_p_p_fr,title_p_p_ar,img_p_p,price_p_p,price_p_p_c,stars_p_p,desc_p_p,desc_p_p_fr,desc_p_p_ar,keyWord_p_p) values 
    	(
       '$cat_p_p',
    	'$title_p_p','$title_p_p_fr','$title_p_p_ar',
    	'$img_p_p',
    	'$price_p_p',
      '$price_p_p_c',
      '$stars_p_p',
    	'$desc_p_p','$desc_p_p_fr','$desc_p_p_ar',
    	'$keyWord_p_p')";

    	$run_pro = mysqli_query($connect , $insert_pro);


    	if (isset($run_pro)) {
    		header("location: addpro.php");
    	}

    }

}

?>

<div class="adminBody">
	
	<form action="addpro.php" method="post" enctype="multipart/form-data">
		<label>Product rating</label><br>
	<select name="cat_p_p" style="margin-top: 5px;">
		<?php 
         
           $get_c = "select * from cat_perfume";
           $run_c = mysqli_query($connect , $get_c);

           while ($row_c = mysqli_fetch_array($run_c)) {
           	
           	echo '<option value="'.$row_c['id_cat_perfume'].'">'.$row_c['name_cat_perfume'].'</option>';
           }

		?>
	</select>
	<br>
		 <label>Title of product</label>
	   <input type="text" name="title_p_p" />
	<br>
     <label>Title fr of product</label>
	   <input type="text" name="title_p_p_fr" />
	<br>
	   <label>Title ar of product</label>
	   <input type="text" name="title_p_p_ar" />
	<br>
	   <label>Product picture</label>
	   <input type="file" name="img_p_p" />
	<br><br>
	<label>Product price</label>
	<input type="text" name="price_p_p" />
  <br><br>
  <label>Product price cachè</label>
  <input type="text" name="price_p_p_c" />
	<br>
	<label>stars of product</label>
	   <input type="text" name="stars_p_p" />
	<br>
	<label>Product description</label>
	<textarea name="desc_p_p"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_p' );
        </script>
    <br>
    <label>Product description fr </label>
	<textarea name="desc_p_p_fr"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_p_fr' );
        </script>
    <br>
    <label>Product description ar</label>
	<textarea name="desc_p_p_ar"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_p_ar' );
        </script>
    <br>
	<label>Keywords</label>
	<input type="text" name="keyWord_p_p" />


	<input type="submit" name="addpro" value="Add product">
	</form>

</div>


<?php  include "inc/footer.php";  ?>


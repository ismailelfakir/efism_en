<?php  include "inc/header.php";  ?>

<?php 

//------------------ post values -------


$cat_p_h = @$_POST['cat_p_h'];
$title_p_h = @$_POST['title_p_h'];
$title_p_h_fr = @$_POST['title_p_h_fr'];
$title_p_h_ar = @$_POST['title_p_h_ar'];
$img_p_h = @$_FILES['img_p_h']['name'];
$img_p_h_tmp = @$_FILES['img_p_h']['tmpname'];
$price_p_h = @$_POST['price_p_h'];
$price_p_h_c = @$_POST['price_p_h_c'];
$stars_p_h = @$_POST['stars_p_h'];
$desc_p_h = @$_POST['desc_p_h'];
$desc_p_h_fr = @$_POST['desc_p_h_fr'];
$desc_p_h_ar = @$_POST['desc_p_h_ar'];
$keyWord_p_h = @$_POST['keyWord_p_h'];



//------------------- move uplude img 

move_uploaded_file($img_p_h_tmp, "images/$img_p_h");


//---------------------- insert pro ---------------
if(isset($_POST['addpro'])){

    if (empty($cat_p_h) || empty($title_p_h) || empty($title_p_h_fr) || empty($title_p_h_ar) ||  empty($img_p_h) || empty($price_p_h) || empty($price_p_h_c) || empty($stars_p_h)|| empty($desc_p_h) || empty($desc_p_h_fr) || empty($desc_p_h_ar) ||empty($keyWord_p_h)) {
    	echo '<script> alert("please enter all data") </script> ';
    }

    else{

    	$insert_pro = "insert into product_health (cat_p_h,title_p_h,title_p_h_fr,title_p_h_ar,img_p_h,price_p_h,price_p_h_c,stars_p_h,desc_p_h,desc_p_h_fr,desc_p_h_ar,keyWord_p_h) values 
    	(
       '$cat_p_h',
    	'$title_p_h','$title_p_h_fr','$title_p_h_ar',
    	'$img_p_h',
    	'$price_p_h',
      '$price_p_h_c',
      '$stars_p_h',
    	'$desc_p_h','$desc_p_h_fr','$desc_p_h_ar',
    	'$keyWord_p_h')";

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
	<select name="cat_p_h" style="margin-top: 5px;">
		<?php 
         
           $get_c = "select * from cat_health";
           $run_c = mysqli_query($connect , $get_c);

           while ($row_c = mysqli_fetch_array($run_c)) {
           	
           	echo '<option value="'.$row_c['id_cat_health'].'">'.$row_c['name_cat_health'].'</option>';
           }

		?>
	</select>
	<br>
		 <label>Title of product</label>
	   <input type="text" name="title_p_h" />
	<br>
     <label>Title fr of product</label>
	   <input type="text" name="title_p_h_fr" />
	<br>
	   <label>Title ar of product</label>
	   <input type="text" name="title_p_h_ar" />
	<br>
	   <label>Product picture</label>
	   <input type="file" name="img_p_h" />
	<br><br>
	<label>Product price</label>
	<input type="text" name="price_p_h" />
  <br><br>
  <label>Product price cachè</label>
  <input type="text" name="price_p_h_c" />
	<br>
	<label>stars of product</label>
	   <input type="text" name="stars_p_h" />
	<br>
	<label>Product description</label>
	<textarea name="desc_p_h"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_h' );
        </script>
    <br>
    <label>Product description fr </label>
	<textarea name="desc_p_h_fr"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_h_fr' );
        </script>
    <br>
    <label>Product description ar</label>
	<textarea name="desc_p_h_ar"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_h_ar' );
        </script>
    <br>
	<label>Keywords</label>
	<input type="text" name="keyWord_p_h" />


	<input type="submit" name="addpro" value="Add product">
	</form>

</div>


<?php  include "inc/footer.php";  ?>


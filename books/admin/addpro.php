<?php  include "inc/header.php";  ?>

<?php 

//------------------ post values -------


$cat_p_b = @$_POST['cat_p_b'];
$title_p_b = @$_POST['title_p_b'];
$title_p_b_fr = @$_POST['title_p_b_fr'];
$title_p_b_ar = @$_POST['title_p_b_ar'];
$img_p_b = @$_FILES['img_p_b']['name'];
$img_p_b_tmp = @$_FILES['img_p_b']['tmpname'];
$price_p_b = @$_POST['price_p_b'];
$price_p_b_c = @$_POST['price_p_b_c'];
$stars_p_b = @$_POST['stars_p_b'];
$desc_p_b = @$_POST['desc_p_b'];
$desc_p_b_fr = @$_POST['desc_p_b_fr'];
$desc_p_b_ar = @$_POST['desc_p_b_ar'];
$keyWord_p_b = @$_POST['keyWord_p_b'];



//------------------- move uplude img 

move_uploaded_file($img_p_b_tmp, "img/$img_p_b");


//---------------------- insert pro ---------------
if(isset($_POST['addpro'])){

    if (empty($cat_p_b) || empty($title_p_b) || empty($title_p_b_fr) || empty($title_p_b_ar) ||  empty($img_p_b) || empty($price_p_b) || empty($price_p_b_c) || empty($stars_p_b)|| empty($desc_p_b) || empty($desc_p_b_fr) || empty($desc_p_b_ar) ||empty($keyWord_p_b)) {
    	echo '<script> alert("please enter all data") </script> ';
    }

    else{

    	$insert_pro = "insert into product_books (cat_p_b,title_p_b,title_p_b_fr,title_p_b_ar,img_p_b,price_p_b,price_p_b_c,stars_p_b,desc_p_b,desc_p_b_fr,desc_p_b_ar,keyWord_p_b) values 
    	(
       '$cat_p_b',
    	'$title_p_b','$title_p_b_fr','$title_p_b_ar',
    	'$img_p_b',
    	'$price_p_b',
      '$price_p_b_c',
      '$stars_p_b',
    	'$desc_p_b','$desc_p_b_fr','$desc_p_b_ar',
    	'$keyWord_p_b')";

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
	<select name="cat_p_b" style="margin-top: 5px;">
		<?php 
         
           $get_c = "select * from cat_books";
           $run_c = mysqli_query($connect , $get_c);

           while ($row_c = mysqli_fetch_array($run_c)) {
           	
           	echo '<option value="'.$row_c['id_cat_books'].'">'.$row_c['name_cat_books'].'</option>';
           }

		?>
	</select>
	<br>
		 <label>Title of product</label>
	   <input type="text" name="title_p_b" />
	<br>
     <label>Title fr of product</label>
	   <input type="text" name="title_p_b_fr" />
	<br>
	   <label>Title ar of product</label>
	   <input type="text" name="title_p_b_ar" />
	<br>
	   <label>Product picture</label>
	   <input type="file" name="img_p_b" />
	<br><br>
	<label>Product price</label>
	<input type="text" name="price_p_b" />
  <br><br>
  <label>Product price cachè</label>
  <input type="text" name="price_p_b_c" />
	<br>
	<label>stars of product</label>
	   <input type="text" name="stars_p_b" />
	<br>
	<label>Product description</label>
	<textarea name="desc_p_b"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_b' );
        </script>
    <br>
    <label>Product description fr </label>
	<textarea name="desc_p_b_fr"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_b_fr' );
        </script>
    <br>
    <label>Product description ar</label>
	<textarea name="desc_p_b_ar"></textarea>
	    <script>
            CKEDITOR.replace( 'desc_p_b_ar' );
        </script>
    <br>
	<label>Keywords</label>
	<input type="text" name="keyWord_p_b" />


	<input type="submit" name="addpro" value="Add product">
	</form>

</div>


<?php  include "inc/footer.php";  ?>


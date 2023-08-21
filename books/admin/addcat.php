<?php include "inc/header.php";?>
<?php 

//-------------------- post value --------
$name_cat_books = @$_POST['name_cat_books'];
$name_cat_books_fr = @$_POST['name_cat_books_fr'];
$name_cat_books_ar = @$_POST['name_cat_books_ar'];

//--------------------------- insert category ------
if(isset($_POST['addcat'])){

	$insert_cat = "insert into cat_books (name_cat_books,name_cat_books_fr,name_cat_books_ar) values ('$name_cat_books','$name_cat_books_fr','$name_cat_books_ar')";
    $run_cat = mysqli_query($connect , $insert_cat);

    if (isset($run_cat)) {
    	
    	header("location: addcat.php");
    }
}




?>
<div class="adminBody">
	<form action="addcat.php" method="post">
		<label>Category name</label>
		<input type="text" name="name_cat_books" />
		<label>Category name fr</label>
		<input type="text" name="name_cat_books_fr" />
		<label>Category name ar</label>
		<input type="text" name="name_cat_books_ar" />
		<input type="submit" name="addcat" value="Add rating">

	</form>

</div>


<?php include "inc/footer.php";?>
<?php
	include 'includes/session.php';

	if(isset($_POST['addcategory'])){
		$name=$_POST['name'];
		$category=$_POST['category'];
		$price=$_POST['price'];

		$subcat="";

		$subcategory=$_POST['subcategory'];//array of subcategory
		$sizesubcat=sizeof($subcategory);
		foreach ($subcategory as $val) {
			$subcat=$subcat.'_'.$val;
		}

		$newname = str_replace(' ', '', $name);
		$sql = "INSERT INTO $newname (category,price, subcategory)
			   VALUES ('$category','$price', '$subcat')";
		$conn->query($sql);
		

		$_SESSION['success'] = 'Category Added!';
	}
	else{
		$_SESSION['error'] = $conn->error;
	}

	header('location: addcategory.php');

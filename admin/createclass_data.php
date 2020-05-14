<?php
	include 'includes/session.php';

	if(isset($_POST['createclass'])){
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
		$sql = "CREATE TABLE $newname (
				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
				category VARCHAR(50) ,
				price VARCHAR(50) ,
				subcategory VARCHAR(200)
			)";
		if($conn->query($sql)){
			$sql = "INSERT INTO classes (class_name)
				VALUES ('$name')";
			$conn->query($sql);

			$sql = "INSERT INTO $newname (category,price, subcategory)
			   VALUES ('$category','$price', '$subcat')";
			$conn->query($sql);

			$_SESSION['success'] = 'Class Created!';

		} else {
			$_SESSION['error'] = $conn->error;
		}

		//creating table for MCQ questions
		// foreach ($subcategory as $val) {
		// 	$mcq = $name . '_' . $category . '_' . $val . '_' . 'MCQquestions';
		// 	$mcq = str_replace(' ', '', $mcq);
		// 	$sql = "CREATE TABLE $mcq (
		// 			id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 			question VARCHAR(500),
		// 			question_img VARCHAR(100), 
		// 			option1 VARCHAR(100),
		// 			option2 VARCHAR(100),
		// 			option3 VARCHAR(100),
		// 			option4 VARCHAR(100),
		// 			answer VARCHAR(100)
		// 		)";
		// 	$conn->query($sql);
		// }

		//Creating table for upload video
		// foreach ($subcategory as $val) {
		// 	$video = $name . '_' . $category . '_' . $val . '_' . 'videos';
		// 	$video = str_replace(' ', '', $video);
		// 	$sql = "CREATE TABLE $video (
		// 				id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 				video_descp VARCHAR(500),
		// 				video_file VARCHAR(100)
		// 			)";
		// 	$conn->query($sql);
		// }

		//Creating table for upload assignment
		// foreach ($subcategory as $val) {
		// 	$assign = $name . '_' . $category . '_' . $val . '_' . 'assignments';
		// 	$assign = str_replace(' ', '', $assign);
		// 	$sql = "CREATE TABLE $assign (
		// 					id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		// 					assignment_descp VARCHAR(500),
		// 					assignment_file VARCHAR(100)
		// 				)";
		// 	$conn->query($sql);
		// }

	}
	else{
		$_SESSION['error'] = $conn->error;
	}

	header('location: createclass.php');
?>

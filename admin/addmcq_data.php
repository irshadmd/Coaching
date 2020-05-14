<?php
include 'includes/session.php';
$subcat = $_GET['id'];
$cat = $_GET['cat'];
$class = $_GET['class'];

// get details of the uploaded file
$fileTmpPath = "";
$fileName = "";
$fileSize = 0;
$fileType = "";
$fileNameCmps ="";
$fileExtension = "";

if (isset($_POST['mcqquestions'])) {
    $question=$_POST['question'];
    
    $op1=$_POST['op1'];
    $op2=$_POST['op2'];
    $op3=$_POST['op3'];
    $op4=$_POST['op4'];
    $answer=$_POST['ans'];

    if (isset($_FILES['uploadedFile']) && $_FILES['uploadedFile']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['uploadedFile']['tmp_name'];
        $fileName = $_FILES['uploadedFile']['name'];
        $fileSize = $_FILES['uploadedFile']['size'];
        $fileType = $_FILES['uploadedFile']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // sanitize file-name
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        // directory in which the uploaded file will be moved
        $uploadFileDir = './uploads/mcq/';
        $dest_path = $uploadFileDir . $newFileName;

        move_uploaded_file($fileTmpPath, $dest_path);
        
    }
    if (isset($_FILES['op1file']) && $_FILES['op1file']['error'] === UPLOAD_ERR_OK) {
        $op1fileTmpPath = $_FILES['op1file']['tmp_name'];
        $op1fileName = $_FILES['op1file']['name'];
        $op1fileSize = $_FILES['op1file']['size'];
        $op1fileType = $_FILES['op1file']['type'];
        $op1fileNameCmps = explode(".", $op1fileName);
        $op1fileExtension = strtolower(end($op1fileNameCmps));

        // sanitize file-name
        $op1newFileName = md5(time() . $op1fileName) . '.' . $op1fileExtension;
        // directory in which the uploaded file will be moved
        $op1uploadFileDir = './uploads/mcq/';
        $op1dest_path = $op1uploadFileDir . $op1newFileName;

        move_uploaded_file($op1fileTmpPath, $op1dest_path);
    }
    if (isset($_FILES['op2file']) && $_FILES['op2file']['error'] === UPLOAD_ERR_OK) {
        $op2fileTmpPath = $_FILES['op2file']['tmp_name'];
        $op2fileName = $_FILES['op2file']['name'];
        $op2fileSize = $_FILES['op2file']['size'];
        $op2fileType = $_FILES['op2file']['type'];
        $op2fileNameCmps = explode(".", $op2fileName);
        $op2fileExtension = strtolower(end($op2fileNameCmps));

        // sanitize file-name
        $op2newFileName = md5(time() . $op2fileName) . '.' . $op2fileExtension;
        // directory in which the uploaded file will be moved
        $op2uploadFileDir = './uploads/mcq/';
        $op2dest_path = $op2uploadFileDir . $op2newFileName;

        move_uploaded_file($op2fileTmpPath, $op2dest_path);
    }
    if (isset($_FILES['op3file']) && $_FILES['op3file']['error'] === UPLOAD_ERR_OK) {
        $op3fileTmpPath = $_FILES['op3file']['tmp_name'];
        $op3fileName = $_FILES['op3file']['name'];
        $op3fileSize = $_FILES['op3file']['size'];
        $op3fileType = $_FILES['op3file']['type'];
        $op3fileNameCmps = explode(".", $op3fileName);
        $op3fileExtension = strtolower(end($op3fileNameCmps));

        // sanitize file-name
        $op3newFileName = md5(time() . $op3fileName) . '.' . $op3fileExtension;
        // directory in which the uploaded file will be moved
        $op3uploadFileDir = './uploads/mcq/';
        $op3dest_path = $op3uploadFileDir . $op3newFileName;

        move_uploaded_file($op3fileTmpPath, $op3dest_path);
    }
    if (isset($_FILES['op4file']) && $_FILES['op4file']['error'] === UPLOAD_ERR_OK) {
        $op4fileTmpPath = $_FILES['op4file']['tmp_name'];
        $op4fileName = $_FILES['op4file']['name'];
        $op4fileSize = $_FILES['op4file']['size'];
        $op4fileType = $_FILES['op4file']['type'];
        $op4fileNameCmps = explode(".", $op4fileName);
        $op4fileExtension = strtolower(end($op4fileNameCmps));

        // sanitize file-name
        $op4newFileName = md5(time() . $op4fileName) . '.' . $op4fileExtension;
        // directory in which the uploaded file will be moved
        $op4uploadFileDir = './uploads/mcq/';
        $op4dest_path = $op4uploadFileDir . $op4newFileName;

        move_uploaded_file($op4fileTmpPath, $op4dest_path);
    }

    
    $sql="INSERT INTO mcqquestions (class,category,subcategory,question,question_img,option1,option2,option3,option4,op1_img,op2_img,op3_img,op4_img,answer,date)
            VALUES('$class','$cat','$subcat','$question','$newFileName','$op1','$op2','$op3','$op4','$op1newFileName','$op2newFileName','$op3newFileName','$op4newFileName','$answer',NOW())";
    if($conn->query($sql)){
        $_SESSION['success'] = 'Question uploaded!';
    }else{
        $_SESSION['error'] = $conn->error;    
    }
    
} else {
    $_SESSION['error'] = $conn->error;
}
$url='addmcqquestions.php?id='.$subcat.'&cat='.$cat.'&class='.$class;
header('location:'.$url);

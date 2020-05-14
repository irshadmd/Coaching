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
$fileNameCmps = "";
$fileExtension = "";

if (isset($_POST['uploadAssignment'])) {
    $assign_descp = $_POST['desp'];

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
        $uploadFileDir = './uploads/assignments/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $_SESSION['success'] = 'Assignment uploaded!';
        } else {
            $_SESSION['error'] = $conn->error;
        }
    }


    $sql = "INSERT INTO assignments (class,category,subcategory,assignment_descp,assign_file,file_extension,date)
            VALUES('$class','$cat','$subcat','$assign_descp','$newFileName','$fileExtension',NOW())";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Assignment uploaded!';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = $conn->error;
}
$url = 'uploadassignment.php?id=' . $subcat . '&cat=' . $cat . '&class=' . $class;
header('location:' . $url);

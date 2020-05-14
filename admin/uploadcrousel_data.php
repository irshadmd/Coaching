<?php
include 'includes/session.php';

// get details of the uploaded file
$fileTmpPath = "";
$fileName = "";
$fileSize = 0;
$fileType = "";
$fileNameCmps = "";
$fileExtension = "";

if (isset($_POST['uploadCrousel'])) {
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
        $uploadFileDir = './uploads/crousel/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $_SESSION['success'] = 'Crousel uploaded!';
        } else {
            $_SESSION['error'] = $conn->error;
        }
    }


    $sql = "INSERT INTO crousel (img,file_extension,date)
            VALUES('$newFileName','$fileExtension',NOW())";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Crousel uploaded!';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = $conn->error;
}
$url = 'uploadcrousel.php';
header('location:' . $url);

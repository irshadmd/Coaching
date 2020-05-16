<?php
include 'includes/session.php';
$message_id = $_GET['id'];
$userid="";
$cat="";
$subcat="";
// get details of the uploaded file
$fileTmpPath = "";
$fileName = "";
$fileSize = 0;
$fileType = "";
$fileNameCmps = "";
$fileExtension = "";

if (isset($_POST['doubtanswer'])) {
    $answer = $_POST['ans'];
    $sql="SELECT * FROM messages Where id='$message_id'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $userid = $row['user_id'];
        $cat=$row['category'];
        $subcat=$row['subcategory'];
    }

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
        $uploadFileDir = './uploads/doubtanswers/';
        $dest_path = $uploadFileDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            
        } else {
            $_SESSION['error'] = $conn->error;
        }
    }
    $sql = "INSERT INTO doubt_answers(message_id,user_id,category,subcategory,answer,answer_img)
                VALUES('$message_id','$userid','$cat','$subcat','$answer','$newFileName')";
    if ($conn->query($sql)) {
        $sql = "UPDATE messages SET status='resolved' WHERE id='$message_id'";
        $conn->query($sql);
        $_SESSION['success'] = 'Submitted!';
    } else {
        $_SESSION['error'] = $conn->error . "" . $message_id . $userid;
    }
} else {
    $_SESSION['error'] = $conn->error;
}
$url = 'doubts.php?class=' . $cat . '&cat=' . $subcat;
header('location:' . $url);

<?php
include 'includes/session.php';
$class=$_GET['class'];
$cat=$_GET['cat'];
if (isset($_POST['addnotification'])) {
    $message = $_POST['message'];

    $sql = "INSERT INTO notification (class,category,announcement) VALUES('$class','$cat','$message')";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Announcement added';
    } else {
        $_SESSION['error'] = $conn->error;
    }
}
$url = 'addnotification.php?class=' . $class . '&cat=' . $cat;
header('location:' . $url);

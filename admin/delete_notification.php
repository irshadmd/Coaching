<?php
include 'includes/session.php';

$id = $_GET['id'];
$class = $_GET['class'];
$cat = $_GET['cat'];
$sql = "DELETE FROM notification WHERE id='$id'";
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Announcement Deleted';
} else {
    $_SESSION['error'] = $conn->error;
}

$url = 'addnotification.php?class=' . $class . '&cat=' . $cat;
header('location:' . $url);

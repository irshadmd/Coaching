<?php
include 'includes/session.php';

$subcat = $_GET['id'];
$cat = $_GET['cat'];
$class = $_GET['class'];
$assignid = $_GET['assignid'];

$name = "";
$sql = "SELECT * FROM assignments WHERE id='$assignid'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $name = $row['assign_file'];
}

if (unlink('./uploads/assignments/' . $name)) {
    $sql = "DELETE FROM assignments WHERE id='$assignid'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Assignment Deleted!';
    } else {
        $_SESSION['error'] = $conn->error . 'database error';
    }
} else {
    $_SESSION['error'] = $conn->error;
}

$url = 'uploadedassignments.php?id=' . $subcat . '&cat=' . $cat . '&class=' . $class;
header('location:' . $url);

<?php
include 'includes/session.php';

$id = $_GET['id'];
$cat = "";
$subcat = "";

$sql = "SELECT * FROM messages Where id='$id'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $cat = $row['category'];
    $subcat = $row['subcategory'];
}
$sql = "UPDATE messages SET permission='disabled' Where id='$id'";
if ($conn->query($sql)) {
    $_SESSION['success'] = 'Disabled';
} else {
    $_SESSION['error'] = $conn->error;
}

$url = 'doubts.php?class=' . $cat . '&cat=' . $subcat;
header('location:' . $url);

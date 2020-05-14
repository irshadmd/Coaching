<?php
include 'includes/session.php';

$id = $_GET['id'];
$name="";
$sql="SELECT * FROM crousel WHERE id='$id'";
$query = $conn->query($sql);
while ($row = $query->fetch_assoc()) {
    $name=$row['img'];
}
if(unlink('./uploads/crousel/'.$name)){
    $sql = "DELETE FROM crousel WHERE id='$id'";
    if ($conn->query($sql)) {

        $_SESSION['success'] = 'Deleted!';
    } else {
        $_SESSION['error'] = $conn->error . 'database error';
    }
}

$url = 'uploadcrousel.php';
header('location:' . $url);

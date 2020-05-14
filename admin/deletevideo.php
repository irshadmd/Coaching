<?php
    include 'includes/session.php';

    $subcat = $_GET['id'];
    $cat = $_GET['cat'];
    $class = $_GET['class'];
    $videoid=$_GET['videoid'];

    $name = "";
    $sql = "SELECT * FROM videos WHERE id='$videoid'";
    $query = $conn->query($sql);
    while ($row = $query->fetch_assoc()) {
        $name = $row['video_file'];
    }

if (unlink('./uploads/videos/' . $name)) {
    $sql = "DELETE FROM videos WHERE id='$videoid'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Video Deleted!';
    } else {
        $_SESSION['error'] = $conn->error . 'database error';
    }
}else{
    $_SESSION['error'] = $conn->error ;
}

$url = 'uploadedvideo.php?id=' . $subcat . '&cat=' . $cat . '&class=' . $class;
header('location:' . $url);

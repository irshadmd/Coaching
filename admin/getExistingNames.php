<?php
include 'includes/session.php';

$class = $_GET['class'];
$cat = $_GET['cat'];
$subcat = $_GET['id'];

$selectedValue = $_POST['selectedValue'];

$ops = "";

$sql = "SELECT DISTINCT test_name FROM mcqquestions WHERE class='$class' AND category='$cat' AND subcategory='$subcat' AND test_type='$selectedValue'";
$query = $conn->query($sql);
if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $ops .= '<option value="' . $row["test_name"] . '">' . $row["test_name"] . '</option>';
    }
} else {
    $ops .= "Create New";
}
$json = array("ops" => $ops);
echo json_encode($json);






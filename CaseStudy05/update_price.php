<?php 
@ $db = new mysqli('localhost', 'root', '', 'javajam');

if (mysqli_connect_errno()) {
   echo 'Error: Could not connect to database.  Please try again later.';
   exit;
}

$newprice = $_POST['price'];
$id = $_POST['id'];

$updatequery = "UPDATE coffee_prices SET price=$newprice WHERE coffee_id=$id";

$result = $db->query($updatequery);

if ($result) {
    echo json_encode(['status' => 'success', 'message' => 'Price updated successfully!!!!!']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to update......']);}
$db->close();
?>
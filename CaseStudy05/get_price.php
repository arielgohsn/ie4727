<?php 
@ $db = new mysqli('localhost', 'root', '', 'javajam');

if (mysqli_connect_errno()) {
   echo 'Error: Could not connect to database.  Please try again later.';
   exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $postquery = "SELECT price FROM coffee_prices WHERE coffee_id=$id";
    $result = $db->query($postquery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode(['status' => 'success', 'price' => $row['price']]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to play fetch']);
    }
}
else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $getquery = "SELECT coffee_id, price FROM coffee_prices";
    $result = $db->query($getquery);
    if ($result->num_rows > 0) {
        $prices = [];
        while($row = $result->fetch_assoc()) {
          $coffee_prices[] = ['coffee_id' => $row['coffee_id'], 'price' => $row['price']];
        }
        echo json_encode(['status' => 'success', 'prices' => $coffee_prices]);
      } else {
        echo json_encode(['status' => 'error', 'message' => 'No prices found']);
      }
}

$db->close(); 
?>
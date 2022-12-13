<?php 

include_once 'connectPSQL.php';

$uuid = $_POST['id'];
$checkout = $_POST['available'];

if ($checkout) {
  $result = pg_query($CONN, 
    "UPDATE books 
    SET available = NOT available,
    checkedout = now()
    WHERE id = '$uuid'");
  
  if ($result) {
    echo 'Update successful';
  } else {
    echo pg_last_error($CONN);
  }
} else {
  echo 'Checkout not altered.';
}


?>
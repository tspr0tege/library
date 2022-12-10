<?php 
  include_once 'connectPSQL.php';

  // print_r($CONN);

  $result = pg_query($CONN, "SELECT * FROM books;");

  if ($result) {
    // $data = pg_fetch_assoc($result);
    echo json_encode(pg_fetch_all($result));
  } else {
    echo pg_last_error($CONN);
  }
  
?>
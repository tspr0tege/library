<?php 
  // echo 'You are attempting a delete!';
  include_once 'connectPSQL.php';

  $id = $_POST['id'];

  $result = pg_query("DELETE FROM books WHERE id = '" . $id . "';");

  if ($result) {
    http_response_code(200);
    echo 'Delete complete';
  } else {
    http_response_code(500);
    echo 'Error deleting';
    throw new Exception();
  }
?>
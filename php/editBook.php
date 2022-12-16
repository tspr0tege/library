<?php 

include_once 'connectPSQL.php';

$uuid = $_POST['id'];
$checkout = $_POST['available'];

if ($checkout) { // When book is being checked out
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
} else { // all other database edits

  $checkID = pg_query($CONN, "SELECT * FROM books WHERE id = '" . $_POST['id'] . "';");
  $currentData = pg_fetch_assoc($checkID);

  $queryStr = "UPDATE books SET ";

  foreach ($_POST as $key => $value) {
    if ($key != 'id' && $currentData[$key] != $value) {
      $queryStr .= $key . " = '" . $value . "', ";
    }
  }
  
  if (!!$_FILES['image']['name']) { // Image detected
    $newImgName = time() . $_FILES['image']['name'];
    
    if(!move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $newImgName)) {
      echo $_FILES['image']['tmp_name'], '../images/' . $newImgName;
      echo 'Error saving picture';
      exit();
    }
    $queryStr .= "image = '" . $newImgName . "'";    
  } else { // No Image chosen
    $queryStr = rtrim($queryStr, ", ");
  }

  if (strlen($queryStr) <= 17) { // nothing added to query string
    echo 'No details have been changed.';
  } else {
    $queryStr .= " WHERE id = '" . $_POST['id'] . "';";
    // echo $queryStr;
    $result = pg_query($CONN, $queryStr);

    if ($result) {
      echo 'successfully updated book';
    } else {
      echo 'error in SQL query';
    }
  }
}


?>
<?php 
  session_start();
  include_once 'connectPSQL.php';

  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['published'];
  $tableCols = array('isbn', 'title', 'author', 'year');
  $colValues = array($isbn, $title, $author, $year);
 
  if(!!$_FILES['image']['name']) {

    if(!!$_FILES['image']['error']) {
      echo 'Image name found, but error contained' . $_FILES['image']['error'];
      exit();
    }

    $newImgName = time() . $_FILES['image']['name'];
    
    if(!move_uploaded_file($_FILES['image']['tmp_name'], '../images/' . $newImgName)) {
      echo $_FILES['image']['tmp_name'], '../images/' . $newImgName;
      echo 'Error saving picture';
      exit();
    }

    array_push($tableCols, 'image');
    array_push($colValues, $newImgName);
  }
  
  $query_str = "INSERT INTO books (" . implode(", ", $tableCols) . ") VALUES ('" . implode("', '", $colValues) . "');";
  $result = pg_query($CONN, $query_str);

  if ($result) {
    echo 'success';
  } else {
    echo pg_last_error($CONN);
  }
?>

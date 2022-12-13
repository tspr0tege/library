<?php 
  include_once 'connectPSQL.php';
  
  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['published'];

  /* 
  $_FILE = [FORM_NAME(attr)]['name', 'type', 'error', 'tmp_name']
  */

  if(isset($_FILES['image'])) {
    echo 'File detected';
  } else {
    echo 'No file detected';
  }
  
  // $result = pg_query($CONN, "INSERT INTO books (isbn, title, author, year) VALUES ('$isbn', '$title', '$author', '$year');");

  // if ($result) {
  //   echo 'success';
  // } else {
  //   echo 'fail';
  // }
?>
<?php 
  include_once 'connectPSQL.php';
  
  $isbn = $_POST['isbn'];
  $title = $_POST['title'];
  $author = $_POST['author'];
  $year = $_POST['published'];
  
  $result = pg_query($CONN, "INSERT INTO books (isbn, title, author, year) VALUES ('$isbn', '$title', '$author', '$year');");

  if ($result) {
    echo 'success';
  } else {
    echo 'fail';
  }
?>
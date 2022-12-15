<?php 
  session_start();
  include_once 'connectPSQL.php';
  $response = '<h3>Book List</h3>';

  $params = htmlspecialchars($_GET['search']);

  function addTile($row) {
    $newTile = '
      <div class="book-tile">
        <img src="images/' . $row['image'] .'" class="thumbnail">
        <div class="book-info">
            <p>Title: ' . $row['title'] . '</p>
            <p>Author: ' . $row['author'] . '</p>
            <p>Year Published: ' . $row['year'] . '</p>
            <p>ISBN: ' . $row['isbn'] . '</p>
            <a href="editBook.php?id=' . $row['id'] . '">Edit/Delete Book</a>
        </div>';
    if ($row['available'] == 't') {
      $newTile .= '
        <div class="book-controls">
          <p>Available: <span class="green">Yes</span></p>
          <button data-id="' . $row['id'] . '">Checkout</button>
        </div>
      </div>';
    } else {
      $newTile .= '
        <div class="book-controls">
          <p>Available: <span class="red">No</span></p>
          <button data-id="' . $row['id'] . '">Return</button>
          <p>Due back:</p>
          <p>' . date('m-d-y', strtotime('+2 weeks', strtotime($row['checkedout']))) . '</p>
        </div>
      </div>';
    }
    return $newTile;
  }

  $queryStr = "SELECT * FROM books";

  if ($params) {
    $queryStr .= " WHERE title LIKE '$params%'
    OR author LIKE '$params%'
    OR isbn LIKE '$params%';";
  } else {
    $queryStr .= ";";
  }
  
  $result = pg_query($CONN, $queryStr);

  if ($result) {
    while($row = pg_fetch_assoc($result)) {          
      $response .= addTile($row);
    }
  } else {
    echo 'Error getting list';
  }

  echo $response;
?>

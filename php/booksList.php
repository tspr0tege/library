<?php 
    session_start();
    include_once 'connectPSQL.php';
    $response = '<h3>Book List</h3>';

    $params = htmlspecialchars($_GET['search']);

    function addTile($row) {
      $newTile = '
        <div class="book-tile">
          <img src="images/default.jpg" class="thumbnail">
          <div class="book-info">
              <p>Title: ' . $row['title'] . '</p>
              <p>Author: ' . $row['author'] . '</p>
              <p>Year Published: ' . $row['year'] . '</p>
              <p>ISBN: ' . $row['isbn'] . '</p>
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

    if ($params) {
      $result = pg_query($CONN, 
        "SELECT * FROM books 
        WHERE title LIKE '$params%'
        OR author LIKE '$params%'
        OR isbn LIKE '$params%';");

      if ($result) {
        // echo 'Search successful';
        while($row = pg_fetch_assoc($result)) {          
          $response .= addTile($row);
        }
      } else {
        echo 'Error in search for ' . $params;
      }

    } else {
      // GET all rows
      $result = pg_query($CONN, "SELECT * FROM books;");
  
      if ($result) {
        // echo 'Hello there!';
        while($row = pg_fetch_assoc($result)) {
          $response .= addTile($row);
        }
      } else {
        echo 'something went wrong';
      }
    }
    echo $response;
?>

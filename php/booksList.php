<?php 
    session_start();
    include_once 'connectPSQL.php';
    $response = '<h3>Book List</h3>';

    // GET all rows
    $result = pg_query($CONN, "SELECT * FROM books;");

    if ($result) {
      // echo 'Hello there!';
      while($row = pg_fetch_assoc($result)) {
        $response .= '
          <div class="book-tile">
            <img src="images/default.jpg" class="thumbnail">
            <div class="book-info">
                <p>Title: ' . $row['title'] . '</p>
                <p>Author: ' . $row['author'] . '</p>
                <p>Year Published: ' . $row['year'] . '</p>
                <p>ISBN: ' . $row['isbn'] . '</p>
            </div>
            <div class="book-controls">
                <p>Available: No</p>
                <button>Return</button>
                <p>Due back: 12-12-2022</p>
            </div>
          </div>
        ';
      }
    } else {
      echo 'something went wrong';
    }

    echo $response;
?>
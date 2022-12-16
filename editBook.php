<html>
  <head>
    <title>Edit Book Details</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
  </head>
  <body>
    <?php    
      $bookID = $_GET['id'];
      include_once 'php/connectPSQL.php';

      $result = pg_query($CONN, "SELECT * FROM books WHERE id='$bookID';");
      if ($result) {
        $row = pg_fetch_assoc($result);        
      } else {
        echo 'Failed to retrieve book from Database';
      }
    ?>

    <section>
      <h3>Edit Book</h3>
      <div id="error-box">
        <ul>

        </ul>
       </div>
      <form id="edit-book-form" enctype="multipart/form-data" data-id="<?php echo $bookID ?>">
        <div class="form-entry">
          <label for="isbn">ISBN:</label>
          <input id="isbn" name="isbn" type="text" value="<?php echo $row['isbn']; ?>" required>
        </div>
        <div class="form-entry">
          <label for="title">Title of the Book:</label>
          <input id="title" name="title" type="text" value="<?php echo $row['title']; ?>" required>
        </div>
        <div class="form-entry">
          <label for="author">Author's Name:</label>
          <input id="author" name="author" type="text" value="<?php echo $row['author']; ?>" required>
        </div>
        <div class="form-entry">
          <label for="year">Year Published:</label>
          <input 
            id="year" 
            name="year" 
            type="number" 
            value="<?php echo $row['year']; ?>" 
            min="1"
            max="<?php echo date('Y') ?>"
          required>
        </div>
        <div class="form-entry" style="flex-direction: row; align-items: flex-end;">
          <img 
            id="cover-image"
            src="images/<?php echo $row['image'] ?>" 
            alt="current book cover image"
          >
          <label for="image">Book cover:</label>
          <input id="image" name="image" type="file">
        </div>
        <div class="form-controls">
          <input type="submit" value="Save & Exit">
          <button id="cancel-edit-btn" >Cancel Editing</button>
          <button id="delete-entry-btn" >Delete From Catalog</button>
        </div>

      </form>
    </section>
    <script src="scripts/validations.js"></script>
    <script src="scripts/editBook.js"></script>
  </body>
</html>
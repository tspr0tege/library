<html>
    <head>
        <title>Add a book</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php include 'nav.php';?>
        <section>
            <h3>Add a new book to the catalog</h3>
            <div id="error-box">
                <ul>

                </ul>
            </div>
            <form id="new-book-form" action="#" enctype="multipart/form-data">
                <div class="form-entry">
                    <label for="isbn">ISBN</label>
                    <input name="isbn" id="isbn" type="text" required>
                </div>
                <div class="form-entry">
                    <label for="title">Title: </label>
                    <input name="title" id="title" type="text" required>
                </div>
                <div class="form-entry">
                    <label for="author">Author:</label>
                    <input name="author" id="author" type="text" required>
                </div>
                <div class="form-entry">
                    <label for="published">Year Published:</label>
                    <input 
                        name="published" 
                        id="published" 
                        type="number" 
                        min="1"            
                        max="<?php echo date('Y') ?>" 
                    required>
                </div>
                <div class="form-entry">
                    <label for="cover-pic">Upload cover:</label>
                    <input name="image" id="cover-pic" type="file">
                </div>
                <input id="submit-btn" type="submit" value="Submit">
            </form>
        </section>

        <script src="./scripts/validations.js"></script>
        <script src="./scripts/submitNewBook.js"></script>
    </body>
</html>
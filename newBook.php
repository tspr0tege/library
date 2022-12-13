<html>
    <head>
        <title>Add a book</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php include 'nav.php';?>
        <section>
            <h3>Add a new book to the catalog</h3>
            <form id="new-book-form" action="#" enctype="multipart/form-data">
                <div class="form-entry">
                    <label for="isbn">ISBN</label>
                    <input name="isbn" id="isbn" type="text">
                </div>
                <div class="form-entry">
                    <label for="title">Title: </label>
                    <input name="title" id="title" type="text">
                </div>
                <div class="form-entry">
                    <label for="author">Author:</label>
                    <input name="author" id="author" type="text">
                </div>
                <div class="form-entry">
                    <label for="published">Year Published:</label>
                    <input name="published" id="published" type="number">
                </div>
                <div class="form-entry">
                    <label for="cover-pic">Upload cover:</label>
                    <input name="image" id="cover-pic" type="file">
                </div>
                <input id="submit-btn" type="submit" value="Submit">
            </form>
        </section>

        <script src="./scripts/submitNewBook.js"></script>
    </body>
</html>
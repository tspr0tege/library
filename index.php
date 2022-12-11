<html>
    <head>
        <title>Library Catalog</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php include 'nav.php';?>
        <section id="search-box">
            <h3>Search</h3>
            <form id="search-form">
                <input type="text" name="search" id="search-text-box" placeholder="Search for a book">
                <input type="submit" id="search-btn" value="Search">
            </form>
        </section>
        <section id="book-list">
            <h3>Book List</h3>
            
        </section>

        <script src="./scripts/retrieveBooksList.js"></script>
    </body>
</html>
<html>
    <head>
        <title>Library Catalog</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php include 'nav.php';?>
        <section id="search-box">
            <h3>Search</h3>
            <form action="#">
                <input type="text" placeholder="Search for a book">
                <button type="submit" id="search-btn">Search</button>
            </form>
        </section>
        <section id="book-list">
            <h3>Book List</h3>
            
        </section>

        <script src="./scripts/retrieveBooksList.js"></script>
    </body>
</html>
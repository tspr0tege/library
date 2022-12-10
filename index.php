<html>
    <head>
        <title>Library Catalog</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <?php include 'nav.php';?>
        <section id="search-box">
            <form action="#">
                <input type="text" placeholder="Search for a book">
                <button type="submit" id="search-btn">Search</button>
            </form>
        </section>
        <section id="book-list">
            <h3>Book List</h3>
            <div class="book-tile">
                <div class="thumbnail"></div>
                <p>Title: The 7 Habits of Highly Effective People</p>
                <p>Author: Stephen Covey</p>
                <p>Year Published: 1994</p>
                <p>ISBN: 3450-345-38945</p>
                <p>Available: No</p>
                <p>Due bacK: 12-12-2022</p>
            </div>
        </section>
    </body>
</html>
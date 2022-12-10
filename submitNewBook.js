const form = document.getElementById('new-book-form');

form.onsubmit = (e) => {
    e.preventDefault();
    // console.log('Form submitted');
    fetch('php/addBook.php')
    .then(async (data) => {
        const response = await data.text();
        console.log(response);
    })
    .catch(console.error);
}
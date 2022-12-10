const form = document.getElementById('new-book-form');

form.onsubmit = (e) => {
    e.preventDefault();
    const formData = new FormData(form)
// let test = formData.entries();
// for (var [key, value] of formData.entries()) { 
//     console.log(key, value);
// }
    fetch('php/addBook.php', {method: 'POST', body: formData})
    .then(async (data) => {
        let response = await data.json();
        console.log(response);
    })
    .catch(console.error);
}
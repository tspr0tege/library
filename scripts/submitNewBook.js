const form = document.getElementById('new-book-form');

form.onsubmit = (e) => {
  e.preventDefault();
  const formData = new FormData(form)
  // console.log(formData.get('image'));
  fetch('php/addBook.php', {method: 'POST', body: formData})
  .then(async (data) => {
    let response = await data.text();
    console.log(response);
  })
  .catch(console.error);
}
function toggleCheckout (e) {

  const formData = new FormData();

  formData.append('id', e.target.dataset.id);
  formData.append('available', 1);

  fetch('php/editBook.php', {
    method: 'POST',
    body: formData
  })
  .then(async (data) => {
    const response = await data.text();
    console.log(response);
    getBookList();
  })
  .catch(console.error);
}

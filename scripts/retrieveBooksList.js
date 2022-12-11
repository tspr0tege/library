const bookList = document.getElementById('book-list');
const searchForm = document.getElementById('search-form');
const searchTxt = document.getElementById('search-text-box');

// initial load
fetch('php/booksList.php')
.then(async (data) => {
  let response = await data.text();
  // console.log(response);
  bookList.innerHTML = response;
  document.querySelectorAll('.book-controls button').forEach((btn) => {
    btn.addEventListener('click', (e) => {console.log('Checkout button clicked for: ' + e.target.dataset.id)})
  });
})
.catch(console.error);

searchForm.onsubmit = (e) => {
  e.preventDefault();
  // console.log(searchTxt.value);
  let endpoint = 'php/booksList.php';
  if (searchTxt.value) {
    endpoint += `?search=${searchTxt.value}`;
  }

  fetch(endpoint)
  .then(async (data) => {
    const response = await data.text();
    bookList.innerHTML = response;
    // console.log(response);
    document.querySelectorAll('.book-controls button').forEach((btn) => {
      btn.addEventListener('click', (e) => {console.log('Checkout button clicked for: ' + e.target.dataset.id)})
    });
  })
  .catch(console.error);
}

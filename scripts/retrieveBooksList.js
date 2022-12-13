const bookList = document.getElementById('book-list');
const searchForm = document.getElementById('search-form');
const searchTxt = document.getElementById('search-text-box');

searchForm.onsubmit = (e) => {
  e.preventDefault();
  getBookList();
}

function getBookList() {
  let endpoint = 'php/booksList.php';
  if (searchTxt.value) {
    endpoint += `?search=${searchTxt.value}`;
  }

  fetch(endpoint)
  .then(async (data) => {
    const response = await data.text();
    bookList.innerHTML = response;
    document.querySelectorAll('.book-controls button').forEach((btn) => {
      btn.addEventListener('click', toggleCheckout);
    });
  })
  .catch(console.error);
}

// initial load
getBookList();

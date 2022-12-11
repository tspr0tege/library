const bookList = document.getElementById('book-list');

fetch('php/booksList.php')
.then(async (data) => {
  let response = await data.text();
  // console.log(response);
  bookList.innerHTML = response;
})
.catch(console.error);

const form = document.getElementById('new-book-form');
const errorBox = document.getElementById('error-box');
const errorList = document.querySelector('#error-box ul');

form.onsubmit = (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  const errors = [];
  
  const validISBN = validateISBN(formData.get('isbn'));
  if (validISBN !== true) {
    errors.push(validISBN);
  }

  const validImage = validateImage(formData.get('image').name);
  if (validImage !== true) {
    errors.push(validImage);
  }

  if (errors.length > 0) {
    // populate errors
    errorList.innerHTML = '';
    errorBox.style.display = 'block';
    errors.forEach((error) => {
      const li = document.createElement('li');
      li.textContent = error;
      errorList.appendChild(li);
    });
  } else {
    fetch('php/addBook.php', {method: 'POST', body: formData})
    .then(async (data) => {
      let response = await data.text();
      if (response == 'success') {
        alert(`${formData.get('title')} was added to the catalog/database.`);
        form.reset();
      } else {
        alert('Unable to add new book to the catalog.');
      }
    })
    .catch(console.error);
  }

}


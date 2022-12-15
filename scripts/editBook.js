// show thumbnail preview
const thumbnail = document.getElementById('cover-image');
const fileUpload = document.getElementById('image');

fileUpload.onchange = (e) => {
  thumbnail.src = URL.createObjectURL(fileUpload.files[0]);
}

// handle form submission
const form = document.getElementById('edit-book-form');

form.onsubmit = (e) => {
  e.preventDefault();
  const formData = new FormData(form);
  formData.append('id', form.dataset.id);
  // for (let entry of formData.entries()) {console.log(entry);}
  fetch('php/editBook.php', {method: 'POST', body: formData})
    .then(async (data) => {
      const response = await data.text();
      console.log(response);
      alert('Edit successful. Returning to catalog.');
      location.assign('index.php');
    })
    .catch(console.error);
}

// Exit form
const cancelBtn = document.getElementById('cancel-edit-btn');
const cancelWarning = 'Do you want to discard changes and return to the catalog?';

cancelBtn.onclick = (e) => {
  e.preventDefault();
  if (confirm(cancelWarning)) {
    location.assign('index.php');
  }
};

// Delete book from database
const deleteBtn = document.getElementById('delete-entry-btn');
const deleteWarning = 'Warning: you are about to permanently delete this book from the database. This cannot be undone. Do you wish to proceed?';

deleteBtn.onclick = (e) => {
  e.preventDefault();
  // form.dataset.id
  const formData = new FormData();
  formData.append('id', form.dataset.id);
  if (confirm(deleteWarning)) {
    fetch('/php/deleteBook.php', {method: 'POST', body: formData})
    .then(async (data) => {
      const response = await data.text();
      console.log(response);
      location.assign('index.php');
    })
    .catch(async (err) => {
      const response = await data.text();
      console.error('Catch executed: ', response);
    });
  }
}

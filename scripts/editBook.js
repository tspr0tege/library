
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
    })
    .catch(console.error);
}
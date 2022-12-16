const validArrLen = [1, 4, 5]

function validateISBN(isbn) {
  // validate isbn
  const isbnStr = isbn;
  const isbnArr = isbnStr.split('-');  
  if (validArrLen.includes(isbnArr.length) && (isbnArr.join('').length === 10 || isbnArr.join('').length === 13)) {
    return true;
  } else {
    return 'ISBN format is incorrect. Please follow either: ISBN-10 or ISBN-13 standards.';
  }
}

const imgExtensions = ['jpg', 'jpeg', 'gif', 'png'];

function validateImage(image) {
  // validate image  
  if (!!image) {
    let ext = image.split('.');
    if (!imgExtensions.includes(ext[ext.length-1])) {
      return 'Invalid file for image. Please upload one of the following: .jpg .jpeg .gif .png';
    } else {
      return true;
    }
  } else { // no image is valid
    return true;
  }
}

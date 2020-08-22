const keyword = document.querySelector('.keyword');
const search_button = document.querySelector('.search_button');
const container = document.querySelector('.container');

// Get rid search button using CSS
search_button.style.display = 'none';

// Event when typing keywords
keyword.addEventListener('keyup', function () {
  fetch('ajax/ajaxSearch.php?keyword=' + keyword.value)
    .then((response) => response.text())
    .then((response) => (container.innerHTML = response));
});

// previewImage() functions
function previewImage() {
  const image = document.querySelector('.image');
  const imagePreview = document.querySelector('.image_preview');

  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);
  oFReader.onload = function (oFREvent) {
    imagePreview.src = oFREvent.target.result;
  }
}
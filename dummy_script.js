//constant variables
const dropZone = document.querySelector('.drop-zone');
const uploadButton = document.querySelector('.upload-button');
const statusMessage = document.querySelector('.status-message');

const ALLOWED_FILE_TYPES = ['image/webp', 'image/jpeg', 'image/png'];
const MAX_FILE_SIZE = 1000000; // 1 MB

//fonction

function openPopUp() {
    document.getElementById("add_file").style.display = "grid";
  }
  
function closePopUp() {
  document.getElementById("myForm").style.display = "none";
  }

function uploadFiles() {
    const formData = new FormData();
  
    files.forEach((file) => {
      formData.append('files', file);
    });
  
    const xhr = new XMLHttpRequest();
    xhr.open('post', 'https://httpbin.org/post');
    xhr.send(formData);
  
    statusMessage.textContent = 'Uploading...';
      xhr.onload = () => {
          if (xhr.status === 200) {
          statusMessage.textContent = '✔️ Files uploaded successfully!';
          } else {
          statusMessage.textContent = '❌ Something went wrong.';
          }
      };
}

function checkFiles() {
    if (files.some((file) => !ALLOWED_FILE_TYPES.includes(file.type))) {
      statusMessage.textContent = '❌ Some files have unsupported types.';
      return;
    }
  
    if (files.some((file) => file.size > MAX_FILE_SIZE)) {
      statusMessage.textContent = '❌ Some files exceed the maximum allowed size (1 MB).';
      return;
    }
  
    uploadFiles();
}
  


//event listeners

let files = [];

dropZone.addEventListener('dragover', (event) => {
  event.preventDefault();
  dropZone.classList.add('drag-over');
});

dropZone.addEventListener('dragleave', () => {
  dropZone.classList.remove('drag-over');
});

dropZone.addEventListener('drop', (event) => {
  event.preventDefault();
  dropZone.classList.remove('drag-over');

  files = Array.from(event.dataTransfer.files);

  checkFiles();
});

uploadButton.addEventListener('click', () => {
  checkFiles();
});


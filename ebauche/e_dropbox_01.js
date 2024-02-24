let dropbox;

dropbox = document.getElementById("dropbox");
dropbox.addEventListener("dragenter", dragenter, false);
dropbox.addEventListener("dragover", dragover, false);
dropbox.addEventListener("drop", drop, false);
function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  const dt = e.dataTransfer;
  const files = dt.files;

  handleFiles(files);
}
function handleFiles(files) {
  for (let i = 0; i < files.length; i++) {
    const file = files[i];

    const p = document.createElement("p");
    p.classList.add("file_item");
    p.file = file;
    dropbox.appendChild(p); // Assuming that "preview" is the div output where the content will be displayed.

    // const reader = new FileReader();
    // reader.onload = (e) => {
    //     p.src = e.target.result;
    // };
    // reader.readAsDataURL(file);
  }
}
function getFiles() {
    const fileList = this.files; /* now you can work with the file list */
    const numFiles = fileList.length;
    const file=fileList[0];
    htmlList="";
    for (let i = 0; i < numFiles; i++) {
        htmlList+=`<li>${fileList[i].name}</li>`;
    }
    const displayDiv = document.getElementById("files_names");
    displayDiv.innerHTML = htmlList;
}


function handleFiles() {
    const inputElement = document.getElementById("file_input");
    const fileList = inputElement.files; /* now you can work with the file list */
    const numFiles = fileList.length;

    //clear the div preview-container
    document.getElementById("preview-container").innerHTML = "";

    for (let i = 0; i < numFiles; i++) {
        let info=fileList[i].name;
        const para = document.createElement("p");
        const node = document.createTextNode(info);
        para.appendChild(node);
        const element = document.getElementById("preview-container");
        element.appendChild(para);
    }
    
}

function openPopUp() {
    document.getElementById("add_file").style.display = "grid";
  }
  
function closePopUp() {
  document.getElementById("myForm").style.display = "none";
  //add a sequence to clear the input

  }
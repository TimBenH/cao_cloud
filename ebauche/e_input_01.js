//const
const inputElement = document.getElementById("files_input");
//event listener
//inputElement.addEventListener("change", null_troubleshoot, false);

//function
function null_troubleshoot(){
    if (inputElement==null){
        console.log("null");
        //delay of 0.5 seconds
        setTimeout(null_troubleshoot, 500);
    }
    else{
        console.log("not null"); 
        getFiles(); 
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
function openPopUp() {
    document.getElementById("add_file").style.display = "grid";
  }
  
function closePopUp() {
  document.getElementById("myForm").style.display = "none";
  }
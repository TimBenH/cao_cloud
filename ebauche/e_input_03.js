//const

const inputElement = document.getElementById("files_input");

//event listener

document.getElementById('input_file').addEventListener('change', function getFiles(e) {
    const fileList = e.target.files; /* now you can work with the file list */
    const numFiles = fileList.length;
    let htmlList="";

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
});

//function

// function null_troubleshoot(){
//     if (inputElement==null){
//         console.log("null");
//         //delay of 0.5 seconds
//         setTimeout(null_troubleshoot, 500);
//     }
//     else{
//         console.log("not null"); 
//         getFiles(); 
//     }
// }

function openPopUp() {
    document.getElementById("add_file").style.display = "grid";
  }
  
function closePopUp() {
  document.getElementById("myForm").style.display = "none";
  }
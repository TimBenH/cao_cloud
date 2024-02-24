function open_add_file(){
    document.getElementById('add_file_p').style.display = 'grid';
}
function open_make_obselete(){
    document.getElementById('make_obselete_p').style.display = 'grid';
}
function open_create_project(){
    document.getElementById('create_project_p').style.display = 'grid';
}
function open_add_coworker(){
    document.getElementById('add_coworker_p').style.display = 'grid';
}
function open_detail_coworker(){
    document.getElementById('detail_coworker_p').style.display = 'grid';
}
function close_add_file(){
    document.getElementById('add_file_p').style.display = 'none';
}
function close_make_obselete(){
    document.getElementById('make_obselete_p').style.display = 'none';
}
function close_create_project(){
    document.getElementById('create_project_p').style.display = 'none';
}
function close_add_coworker(){
    document.getElementById('add_coworker_p').style.display = 'none';
}
function close_detail_coworker(){
    document.getElementById('detail_coworker_p').style.display = 'none';
}

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
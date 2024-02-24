function check() {
    var input = document.getElementById('files');
    for (var i = 0; i < input.files.length; i++) {
        console.log(input.files[i].name);
        var currentDiv = document.getElementsByClassName("container");
        var newContent = document.createTextNode(input.files[i].name);
        currentDiv.appendChild(newContent);
    }
}
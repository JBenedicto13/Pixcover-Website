function check_file() {
    var checkFile = document.getElementById('uploadContent');
    var contentInfo = document.getElementById('contentInfo');
    var chosenImage = document.getElementById('chosen-image');

    checkFile.onchange = () => {
        if (checkFile.files.length == 0) {
            contentInfo.style.display = "none";
        } else {
            contentInfo.style.display = "flex";
        }

        let reader = new FileReader();
        reader.readAsDataURL(checkFile.files[0]);
        reader.onload = () => {
            chosenImage.setAttribute("src",reader.result);
        }
    }
}

function change_dp() {
    let uploadButton = document.getElementById("upload-button");
    let chosenImage = document.getElementById("chosen-image");
    let fileName = document.getElementById("file-name");

    uploadButton.onchange = () => {
        let reader = new FileReader();
        reader.readAsDataURL(uploadButton.files[0]);
        reader.onload = () => {
            chosenImage.setAttribute("src",reader.result);
        }
    }
}
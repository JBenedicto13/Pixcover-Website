function check_file() {
    var checkFile = document.getElementById('uploadContent');
    var contentInfo = document.getElementById('contentInfo');
    var btnUpload = document.getElementById('btnUpload');
    var btnUploadCheck = document.getElementById('btnUploadCheck');

    if (checkFile.files.length == 0) {
        contentInfo.style.display = "none";
        btnUpload.style.display = "none";
        btnUploadCheck.style.display = "inline-block";
    } else {
        contentInfo.style.display = "flex";
        btnUpload.style.display = "inline-block";
        btnUploadCheck.style.display = "none";
    }
}
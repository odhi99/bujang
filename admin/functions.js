console.log("Functions JS Called");
function validasiFile() {
  var inputFile = document.getElementById("tfoto");
  var pathFile = inputFile.value;
  var ekstensiOk = /(\.jpg|\.png)$/i;
  if (!ekstensiOk.exec(pathFile)) {
    Swal.fire("", "Silakan upload file yang memiliki ekstensi (.jpg)", "info");
    inputFile.value = "";
    return false;
  } else {
    //Pratinjau gambar
    if (inputFile.files && inputFile.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("pratinjauGambar").innerHTML =
          '<img class="img-thumbnail" src="' + e.target.result + '"/>';
      };
      reader.readAsDataURL(inputFile.files[0]);
    }
  }
}

function validasiFile1() {
  var inputFile = document.getElementById("ufoto");
  var pathFile = inputFile.value;
  var ekstensiOk = /(\.jpg|\.png)$/i;
  if (!ekstensiOk.exec(pathFile)) {
    Swal.fire("", "Silakan upload file yang memiliki ekstensi (.jpg)", "info");
    inputFile.value = "";
    return false;
  } else {
    //Pratinjau gambar
    if (inputFile.files && inputFile.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("pratinjauGambar1").innerHTML =
          '<img class="img-thumbnail" src="' +
          e.target.result +
          '" width="100px" height="100px"/>';
      };
      reader.readAsDataURL(inputFile.files[0]);
    }
  }
}

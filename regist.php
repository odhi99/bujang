<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regist | Futsal</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">

</head>



<body class="login-bg">
    <div class="container d-flex justify-content-center  align-items-center h-100">

        <form class="bg-light w-100 m-5 p-4 " action="" style="border-radius: 10px;">
            <div class="">
                <div class="leading">
                </div>
                <div class="d-flex justify-content-center">
                    <h1>Regist</h1>
                </div>
            </div>

            <div class="row">

                <div class="input my-3 col">
                    <label class="form-label">Nama</label>
                    <input type="text" id="nama" class="form-control border border-black">
                </div>
                <div class="input my-3 col">
                    <label class="form-label">Alamat</label>
                    <input type="text" id="alamat" class="form-control border border-black">
                </div>
            </div>

            <div class="input my-3">
                <label class="form-label">Hp</label>
                <input type="text" id="hp" class="form-control border border-black">
            </div>


            <p for="" class="mt-3">Foto</p>
            <!-- <img src="uploads/img/" alt="" style="width:150px; height: 100px"> -->
            <input type="file" class="form-control mt-3" id="tfoto" onchange="validasiFile()">

            <div class="col-md-2 mb-2 mt-3" id="pratinjauGambar"></div>


            <div class="input my-3">
                <label class="form-label">Username</label>
                <input type="text" id="username" class="form-control border border-black">
            </div>
            <div class="input my-3">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control border border-black">
            </div>

            <button type="button" class="btn btn-primary input" onclick="regist()">Submit</button>

    </div>

    </form>

    </div>


    <!-- JQUERY -->
    <script src="assets/jquery/dist/jquery.min.js"></script>

    <!-- SWEETALERT -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
    console.log("Functions JS Called");

    function validasiFile() {
        var inputFile = document.getElementById('tfoto');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            Swal.fire('', 'Silakan upload file yang memiliki ekstensi (.jpg)', 'info');
            inputFile.value = '';
            return false;
        } else {
            //Pratinjau gambar
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('pratinjauGambar').innerHTML = '<img class="img-thumbnail" src="' + e
                        .target
                        .result + '"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }

    function validasiFile1() {
        var inputFile = document.getElementById('ufoto');
        var pathFile = inputFile.value;
        var ekstensiOk = /(\.jpg)$/i;
        if (!ekstensiOk.exec(pathFile)) {
            Swal.fire('', 'Silakan upload file yang memiliki ekstensi (.jpg)', 'info');
            inputFile.value = '';
            return false;
        } else {
            //Pratinjau gambar
            if (inputFile.files && inputFile.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('pratinjauGambar1').innerHTML = '<img class="img-thumbnail" src="' + e
                        .target.result + '" width="100px" height="100px"/>';
                };
                reader.readAsDataURL(inputFile.files[0]);
            }
        }
    }


   function regist(){
        let nama = $('#nama').val();
        let hp = $('#hp').val();
        let alamat = $('#alamat').val();
        let username = $('#username').val();
        let password = $('#password').val();
        let files = $('#tfoto')[0].files[0]
        let level = "regist"



        if (nama == "" || alamat == "" || hp == "" || username == "" || password == "" || files == null) {
            Swal.fire(
                '',
                'Mohon lengkapi formulir',
                'question'
            )
        } else {
            let fd = new FormData();

            fd.append('nama', nama)
            fd.append('alamat', alamat)
            fd.append('hp', hp)
            fd.append('foto', files)
            fd.append('username', username)
            fd.append('password', password)
            fd.append('level', level)

            $.ajax({
                type: "POST",
                url: "auth/login.php",
                data: fd,
                contentType: false,
            processData: false,


            success: function(res) {
                console.log(res);
                // $('#tambah-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("login.php");
                        }
                    });
                } else if (res === "gagal") {
                    Swal.fire('', 'merek telah terdaftar', 'error');
                } else {
                    alert("Gagal input !");
                }
            }
            })
        }


    }
    </script>


</body>

</html>
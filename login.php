<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Inventaris</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="assets/style.css">

</head>



<body class="login-bg">
    <div class="container-fluid d-flex justify-content-center">

        <form class="login" action="">
            <div class="main">
                <div class="leading">
                </div>
                <div class="logo d-flex justify-content-center">Login </div>
            </div>
            <div class="input">
                <label class="form-label">Username</label>
                <input type="text" id="username" class="form-control" placeholder="username">
            </div>
            <div class="input">
                <label class="form-label">Password</label>
                <input type="password" id="password" class="form-control" placeholder="********">
            </div>
            <div class="px-2">
                <select id="level" class="p-2">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                    <option value="superadmin">Super Admin</option>
                </select>
            </div>

            <button type="button" class="btn btn-primary input" id="login">Submit</button>
            <a href="index.php" class="btn btn-primary " id="login">Masuk sebagai tamu</a>
            <div class="d-flex justify-content-end">

                <a href="regist.php">Belum Pernah Daftar?</a>
            </div>

        </form>

    </div>

    <!-- JQUERY -->
    <script src="assets/jquery/dist/jquery.min.js"></script>

    <!-- SWEETALERT -->
    <link rel="stylesheet" href="assets/sweetalert2/dist/sweetalert2.min.css">
    <script src="assets/sweetalert2/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
    $('#login').click(() => {
        let username = $('#username').val();
        let password = $('#password').val();
        let level = $('#level').val();

        if (username == "" || password == "") {
            Swal.fire(
                '',
                'Mohon lengkapi formulir',
                'question'
            )
        } else {
            $.ajax({
                type: "POST",
                url: "auth/login.php",
                data: {
                    username: username,
                    password: password,
                    level: level,
                },

                success: (res) => {
                    console.log(res);
                    if (res === "user") {
                        window.location = "index.php";

                    } else if (res === "admin") {
                        window.location = "admin/index.php";
                    } else if (res === "superadmin") {
                        window.location = "superadmin/index.php";
                    } else {
                        Swal.fire("Gagal!",
                            "Login tidak berhasil, silahkan cek user dan password anda.",
                            "error");
                    }
                }
            })
        }


    })
    </script>


</body>

</html>
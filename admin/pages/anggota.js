console.log("anggota.js Called");
function tambah() {
    let nama = $('#tnama').val()
    let alamat = $('#talamat').val()
    let hp = $('#thp').val()
    let files = $('#tfoto')[0].files[0]
    let username = $('#tusername').val()
    let password = $('#tpassword').val()
    let aksi = "tambah"
    
    if (nama == "" || alamat == "" || hp == "" || username == "" || password == "" || files == null) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('alamat', alamat)
        fd.append('hp', hp)
        fd.append('foto', files)
        fd.append('username', username)
        fd.append('password', password)
        fd.append('aksi', aksi)

        $.ajax({
            url: "controller/anggota.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#tambah-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=anggota");
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

// Edit
$(document).on("click", "#edit-btn", function() {
    let nama = $(this).attr("data-nama");
    let alamat = $(this).attr("data-alamat");
    let hp = $(this).attr("data-hp");
    let id = $(this).attr("data-id");
    let foto = $(this).attr("data-foto");
    let username = $(this).attr("data-username");
    let password = $(this).attr("data-password");

    $('#unama').val(nama)
    $('#ualamat').val(alamat)
    $('#uhp').val(hp)
    $('#uid').val(id)
    // $('#ufoto').val(foto)
    $('#uusername').val(username)
    $('#upassword').val(password)

    let location = "../assets/img/users/";
    location += foto

    document.getElementById('pratinjauGambar0').innerHTML = '<img class="img-thumbnail" src="'+location+'" width="100px" height="100px"/>';

})


function edit() {
    let nama = $('#unama').val()
    let alamat = $('#ualamat').val()
    let hp = $('#uhp').val()
    let id = $('#uid').val()
    let foto = $('#ufoto').val()
    // console.log(foto);
    let files = $('#ufoto')[0].files[0]
    let username = $('#uusername').val()
    let password = $('#upassword').val()
    let aksi = "edit"

    if (nama == "" || alamat == "" || hp == "" || username == "" || password == "") {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('id', id)
        fd.append('alamat', alamat)
        fd.append('hp', hp)
        fd.append('foto', files)
        fd.append('nmfoto', foto)
        fd.append('username', username)
        fd.append('password', password)
        fd.append('aksi', aksi)

        $.ajax({
            url: "controller/anggota.php",
            type: "POST",
            data: fd,
            contentType: false,
            processData: false,

            success: function(res) {
                console.log(res);
                $('#tambah-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=anggota");
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


$(document).on('click', '#delete-btn', function() {
    let id = $(this).attr("data-id");
    
    $('#did').val(id)
})

function hapus() {
    console.log($('#did').val())
    let id = $('#did').val();
    let aksi = 'hapus'

    let fd = new FormData();
        fd.append('id', id)
        fd.append('aksi', aksi)

    $.ajax({
        url: "controller/anggota.php",
        type: "POST",
        data: fd,
        contentType: false,
        processData: false,

        success: function(res){
            console.log(res);
                $('#delete-modal').modal('hide')
                if (res === "sukses") {
                    swal.fire({
                        title: "Berhasil",
                        text: "Berhasil Menyimpan Data",
                        icon: "success",
                        showConfirmButton: true,
                    }).then(function(isConfirm) {
                        if (isConfirm) {
                            window.location.replace("index.php?page=anggota");
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
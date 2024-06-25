console.log("Produk.js Called");

const url = "controller/produk.php";
const page = "index.php?page=produk";
let img = "../assets/img/produk/";


function tambah() {
    let nama = $('#tnama').val()
    let harga = $('#tharga').val()
    let jumlah = $('#tjumlah').val()
    
    let files = $('#tfoto')[0].files[0]
    let aksi = "tambah"
    
    if (nama == "" || harga == "" || jumlah == "" || files == null) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');
        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('harga', harga)
        fd.append('jumlah', jumlah)
        fd.append('foto', files)
        
        fd.append('aksi', aksi)

        $.ajax({
            url: url,
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
                            window.location.replace(page);
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
    let harga = $(this).attr("data-harga");
    let jumlah = $(this).attr("data-jumlah");
   

    let id = $(this).attr("data-id");
    let foto = $(this).attr("data-foto");
  
    $('#unama').val(nama)
    $('#uharga').val(harga)
    $('#ujumlah').val(jumlah)
    $('#uid').val(id)
    // $('#ufoto').val(foto)

    img += foto

    document.getElementById('pratinjauGambar0').innerHTML = '<img class="img-thumbnail" src="'+img+'" width="100px" height="100px"/>';

})


function edit() {
    let nama = $('#unama').val()
    let harga = $('#uharga').val()
    let jumlah = $('#ujumlah').val()
    let id = $('#uid').val()
    let foto = $('#ufoto').val()
    // console.log(foto);
    let files = $('#ufoto')[0].files[0]
    let aksi = "edit"

    if (nama == "" || harga == "" || jumlah == "" ) {
        {
            Swal.fire('', 'field tidak boleh kosong', 'error');

        }
    } else {
        let fd = new FormData();
        fd.append('nama', nama)
        fd.append('id', id)
        fd.append('harga', harga)
        fd.append('jumlah', jumlah)
        fd.append('foto', files)
        fd.append('nmfoto', foto)
        fd.append('aksi', aksi)

        $.ajax({
            url: url,
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
                            window.location.replace(page);
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
    console.log(id);
    
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
        url:url,
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
                            window.location.replace(page);
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
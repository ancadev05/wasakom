// $(document).ready(function () {
// Image Preview
$("#gambar").change(function () {
    previewImage(this);
});

function previewImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#img-view").attr("src", e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}
// });

//Script tooltips
const tooltipTriggerList = document.querySelectorAll(
    '[data-bs-toggle="tooltip"]'
);
const tooltipList = [...tooltipTriggerList].map(
    (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
);

// script sweetalert
function klik() {
    Swal.fire("ok");
    console.log("ok");
}

function berhasil() {
    Swal.fire({
        position: "center",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1000,
    });
}

function hapus() {
    Swal.fire({
        title: "Anda yakin ingin hapus data?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes",
    }).then((result) => {
        if (result.isConfirmed) {
            Swal.fire({
                title: "Data berhasil dihapus",
                // text: "Data berhasil dihapus",
                icon: "success",
                timer: 1500,
            });
        }
    });
}

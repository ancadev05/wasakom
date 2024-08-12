$(document).ready(function () {
    // if (successMessage) {
    //     Swal.fire({
    //         icon: "warning",
    //         text: "Data tidak ditemukan!",
    //         timer: 2500,
    //     });
    // }
    // if (session("not")) {
    //     Swal.fire({
    //         icon: "warning",
    //         text: "Data tidak ditemukan!",
    //         timer: 2500,
    //     });
    // }

    // // alert untuk menampilkan ketika data berhasil di hapus
    if (session("delete")) {
        Swal.fire({
            title: "Deleted!",
            text: "Your file has been deleted.",
            icon: "success",
            timer: 2500,
        });
    }

    // hapus data
    $(".delete-btn").on("click", function (event) {
        event.preventDefault(); // Mencegah submit form secara otomatis

        var form = $(this).closest("form"); // Dapatkan form yang terkait dengan tombol

        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit(); // Submit form jika pengguna mengonfirmasi
            }
        });
    });

    // function delete() {
    //     Swal.fire({
    //         title: "Are you sure?",
    //         text: "You won't be able to revert this!",
    //         icon: "warning",
    //         showCancelButton: true,
    //         confirmButtonColor: "#3085d6",
    //         cancelButtonColor: "#d33",
    //         confirmButtonText: "Yes, delete it!"
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             Swal.fire({
    //                 title: "Deleted!",
    //                 text: "Your file has been deleted.",
    //                 icon: "success"
    //             });
    //         }
    //     });
    // }
});

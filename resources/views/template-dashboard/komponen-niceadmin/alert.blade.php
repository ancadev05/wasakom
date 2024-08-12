<script>
    $(document).ready(function() {
        // alert jika data laptop tidak ditemukan
        @if (session('not'))
            {
                Swal.fire({
                    icon: "warning",
                    text: "Data tidak ditemukan!",
                    // timer: 2500,
                });
            }
        @endif

        // alert jika berhasil tambah data
        @if (session("success")) {
                Swal.fire({
                    title: "Succss!",
                    text: "Berhasil tambah data.",
                    icon: "success",
                    timer: 2000,
                });
            }
        @endif

        // confirm hapus data
        $(".delete-btn").on("click", function(event) {
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

        // alert jika data telah dihapus
        @if (session("delete")) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success",
                    timer: 3000,
                });
            }
        @endif
    });
</script>

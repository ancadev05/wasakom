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

        // alert sukses jika berhasil menambah atau update data
        @if (session('success'))
            {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ Session::get('success') }}"
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


    });
</script>

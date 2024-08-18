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

        // alert create
        @if (session('create'))
            {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ Session::get('create') }}"
                });
            }
        @endif

         // alert update data
         @if (session('update'))
            {
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "success",
                    title: "{{ Session::get('update') }}"
                });
            }
        @endif

        // alert jika berhasil tambah data
        // @if (session('success'))
        //     {
        //         Swal.fire({
        //             title: "Succss!",
        //             text: "Berhasil tambah data.",
        //             icon: "success",
        //             timer: 2000,
        //         });
        //     }
        // @endif

        // alert jika berhasil update data
        // @if (session('update'))
        //     {
        //         Swal.fire({
        //             title: "Succss!",
        //             text: "Berhasil update data.",
        //             icon: "success",
        //             timer: 2000,
        //         });
        //     }
        // @endif

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

        // alert delete data
        @if (session('delete'))
            {
                Swal.fire({
                    title: "Deleted!",
                    text: "{{ Session::get('delete') }}",
                    icon: "success",
                    // timer: 3000,
                });
            }
        @endif

        // alert success
        // @if (session('success'))
        //     {
        //         Swal.fire({
        //             title: "Success!",
        //             text: "{{ Session::get('success') }}",
        //             icon: "success",
        //             timer: 3000,
        //         });
        //     }
        // @endif

        // alert info
        @if (session('info'))
            {
                Swal.fire({
                    title: "Info!",
                    text: "{{ Session::get('info') }}",
                    icon: "info",
                    timer: 3000,
                });
            }
        @endif
    });
</script>

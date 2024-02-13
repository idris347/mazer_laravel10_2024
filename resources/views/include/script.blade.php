<script src="{{ asset('template') }}/assets/js/bootstrap.js"></script>
<script src="{{ asset('template') }}/assets/js/app.js"></script>

<!-- Need: Apexcharts -->
<script src="{{ asset('template') }}/assets/extensions/apexcharts/apexcharts.min.js"></script>
<script src="{{ asset('template') }}/assets/js/pages/dashboard.js"></script>
<script src="{{ asset('template') }}/assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{ asset('template') }}/assets/js/pages/simple-datatables.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).on('click', '.delete-product', function() {
        let productId = $(this).data('product-id');
        Swal.fire({
            title: 'Apakah Kamu yakin?',
            text: "Ingin Menghapus Data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ya, saya akan hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Terhapus!',
                    'Data sudah berhasil dihapus.',
                    'success'
                ).then(() => {
                    $(`#delete-form-${productId}`).submit();
                });
            }
        });
    });
    $(document).ready(function() {
        $("#i").fadeIn('fast').delay(3000).fadeOut('fast');
    });
    $(document).ready(function() {
        $("#n").fadeIn('fast').delay(3000).fadeOut('fast');
    });
    $(document).ready(function() {
        $("#b").fadeIn('fast').delay(3000).fadeOut('fast');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    const checkbox = document.getElementById("iaggree")
    const buttonDeleteAccount = document.getElementById("btn-delete-account")
    checkbox.addEventListener("change", function() {
        const checked = checkbox.checked
        if (checked) {
            buttonDeleteAccount.removeAttribute("disabled")
        } else {
            buttonDeleteAccount.setAttribute("disabled", true)
        }
    })
</script>

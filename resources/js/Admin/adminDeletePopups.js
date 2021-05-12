window.$ = window.jquery = window.jQuery = require('jquery')
import Swal from 'sweetalert2/dist/sweetalert2.js'
$('.deleteHeader').on('click', function (e) {
    e.preventDefault();
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success ml-2',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Удалить данные?',
        text: "Эти данные невозможно будет восстановить!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'ДА, Удалить!',
        cancelButtonText: 'Оменить!',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            swalWithBootstrapButtons.fire(
                'Данные успешно удалены!'
            )
            setTimeout(() => {
                $('.deleteHeaderForm').submit()
            }, 1000)
        } else {
            result.dismiss === Swal.DismissReason.cancel
        }
    })
})

window.$ = window.jquery = window.jQuery = require('jquery')

$(document).ready(function () {
    $('.custom-file-input').on('change', function (e) {
        let image = e.target.files[0].name.toString()
        $('.custom-file-label').html(image)
    })
})

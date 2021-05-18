window.$ = window.jquery = window.jQuery = require('jquery')
require('jquery-mask-plugin/dist/jquery.mask.min')
require('./bootstrap');
require('admin-lte/dist/js/adminlte')
require('summernote')
import './Admin/adminDeletePopups'
import './Admin/adminCustomMethods'
require('summernote/lang/summernote-ru-RU')
require('dropzone')
let files = []
let filename = Math.random().toString(10);
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
    }
});

jQuery(document).ready(function () {
    jQuery('#startTime').mask('00:00', {
        onChange: function(cep){
            let str = cep.split(':', 2)
            if (str[0] > 24)
                jQuery('#startTime').val('23:')
            if (str[1] > 59)
            jQuery('#startTime').val(str[0] + ':59')
        },
    });
    jQuery('#endTime').mask('00:00', {
        onChange: function(cep){
            let str = cep.split(':', 2)
            if (str[0] > 24)
                jQuery('#endTime').val('23:')
            if (str[1] > 59)
                jQuery('#endTime').val(str[0] + ':59')
        },
    });
    jQuery('.user-phone').mask('+380000000000')
    jQuery('.feedback-phone').mask('+380000000000')
    jQuery('.footer-phone').mask('+380000000000')
    jQuery('.feedback-description').summernote({
        lang: 'ru-Ru'
    })
    jQuery('.post-description').summernote({
        lang: 'ru-RU'
    })



    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

// Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    let previewNode = document.querySelector("#template")
    previewNode.id = ""
    let previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    let myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {

    })
    myDropzone.on('removedfile', function (file) {
        let index = files.indexOf(file.dataURL)
        if (index > -1){
            files.splice(index, 1)
            // putImagesToSession(files)
        }
    })
    myDropzone.on('thumbnail', function (file) {
        files.push(file.dataURL)
        // putImagesToSession(files)
    })

    myDropzone.on("queuecomplete", function(progress) {
    })

    jQuery('.addNewPost').click(function (event) {
        event.preventDefault()
        putImagesToSession(files)
        jQuery('.addNewPostForm').submit();
    })

})

function putImagesToSession(images = []) {
    $.ajax({
        url: '/admin/post-gallery',
        method: 'POST',
        data: {
            images: images
        },
        success: function (response) {
            console.log(response)
        },
        error: function (error) {
            console.log(error)
        }
    })
}


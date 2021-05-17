window.$ = window.jquery = window.jQuery = require('jquery')
require('jquery-mask-plugin/dist/jquery.mask.min')
require('./bootstrap');
require('admin-lte/dist/js/adminlte')
require('summernote')
import './Admin/adminDeletePopups'
import './Admin/adminCustomMethods'
require('summernote/lang/summernote-ru-RU')
require('dropzone')

let gMapLinks = document.getElementsByTagName('iframe')
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
    jQuery('.feedback-description').summernote({
        lang: 'ru-Ru'
    })
    jQuery('.post-description').summernote({
        lang: 'ru-RU' // default: 'en-US'
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
        console.log(file)
        // Hookup the start button
        // file.previewElement.querySelector(".start").onclick = function() { myDropzone.enqueueFile(file) }
    })

// Update the total progress bar
//     myDropzone.on("totaluploadprogress", function(progress) {
//         document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
//     })

    // myDropzone.on("sending", function(file) {
    //     // Show the total progress bar when upload starts
    //     document.querySelector("#total-progress").style.opacity = "1"
    //     // And disable the start button
    //     file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    // })

// Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        // document.querySelector("#total-progress").style.opacity = "0"
    })

})



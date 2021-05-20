window.jQuery = require('jquery')
let files = []
jQuery(document).ready(function () {
    Dropzone.autoDiscover = false

    let previewNode = document.querySelector("#template")
    previewNode.id = ""
    let previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    let myDropzone = new Dropzone(document.body, {
        url: "/target-url",
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false,
        previewsContainer: "#previews",
        clickable: ".fileinput-button"
    })

    myDropzone.on('removedfile', function (file) {
        let index = files.indexOf(file.dataURL)
        if (index > -1){
            files.splice(index, 1)
        }
    })
    myDropzone.on('thumbnail', function (file) {
        files.push(file.dataURL)
    })

    jQuery('.addNewPost').click(function (event) {
        event.preventDefault()
        putImagesToSession(files)
        jQuery('.addNewPostForm').submit();
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
})

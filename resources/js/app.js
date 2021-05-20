window.$ = window.jquery = window.jQuery = require('jquery')
require('jquery-mask-plugin/dist/jquery.mask.min')
require('./bootstrap');
require('admin-lte/dist/js/adminlte')
require('summernote')
import './Admin/adminDeletePopups'
import './Admin/adminCustomMethods'
require('summernote/lang/summernote-ru-RU')
require('dropzone')
require('waypoints/lib/noframework.waypoints.min');
require('./main')
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




})




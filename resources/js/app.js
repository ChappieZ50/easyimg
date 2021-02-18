require('./bootstrap');


window.$ = window.jQuery = require('jquery');
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap.bundle'
import Clipboard from "clipboard/dist/clipboard";
import Swal from 'sweetalert2'

const feather = require('feather-icons');
$(document).ready(function () {
    /* Replacing Icons */
    feather.replace();

    /* Windows Sizes */
    $(window).on('resize', function () {
        if (window.matchMedia('(max-width: 992px)').matches) {
            $('.login-items .rob-move-btn').appendTo('.navbar')
        } else {
            if ($('.login-items .rob-move-btn').length === 0) {
                $('.navbar .rob-move-btn').appendTo('.login-items')
            }
        }

    }).resize();


    /* Copy Image Link */
    let clipboard = new Clipboard('#copy');

    function setTooltip(btn, message) {
        $(btn).tooltip('hide')
            .attr('data-original-title', message)
            .tooltip('show');
    }

    function hideTooltip(btn) {
        setTimeout(function () {
            $(btn).tooltip('hide');
        }, 1000);
    }


    clipboard.on('success', function (e) {
        setTooltip(e.trigger, 'Image Copied!');
        hideTooltip(e.trigger);
    });

    clipboard.on('error', function (e) {
        setTooltip(e.trigger, 'Failed!');
        hideTooltip(e.trigger);
    });

    /* Delete Image */
    $('#delete').on('click', function () {
        let id = $(this).attr('data-id');
        Swal.fire({
            title: "Are you sure?",
            text: "This image will delete forever.",
            icon: "error",
            confirmButtonText: "Yes, Delete it",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            confirmButtonColor: '#e34346',
        }).then(result => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Image successfully deleted.",
                    icon: "success",
                })
            }
        });
    });
});


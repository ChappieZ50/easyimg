require('./bootstrap');


window.$ = window.jQuery = require('jquery');
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap.bundle'

const feather = require('feather-icons');
$(document).ready(function () {
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

});


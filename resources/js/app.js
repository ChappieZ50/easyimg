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
            $('.login-items .rob-sign-up').appendTo('.navbar')
        } else {
            if ($('.login-items .rob-sign-up').length === 0) {
                $('.navbar .rob-sign-up').appendTo('.login-items')
            }
        }

    }).resize();

});


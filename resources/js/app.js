require('./bootstrap');


window.$ = window.jQuery = require('jquery');
import '@popperjs/core';
import 'bootstrap/dist/js/bootstrap.bundle'

const Uppy = require('@uppy/core');
const XHRUpload = require('@uppy/xhr-upload');
const DragDrop = require('@uppy/drag-drop');

const feather = require('feather-icons');
$(document).ready(function () {
    feather.replace();
});


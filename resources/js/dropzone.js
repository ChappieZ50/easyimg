const Uppy = require('@uppy/core');
const XHRUpload = require('@uppy/xhr-upload');
const Dashboard = require('@uppy/dashboard');

$(document).ready(function () {
    const uppy_note = $('#ipool_dropzone').attr('data-note'),
        uppy_drop_string = $('#ipool_dropzone').attr('data-drop'),
        uppy_browse_string = $('#ipool_dropzone').attr('data-browse'),
        uppy_maxFileSize = $('#ipool_dropzone').attr('data-max-size'),
        uppy_maxFile = $('#ipool_dropzone').attr('data-max-file');
    const uppy = new Uppy({
        debug: false,
        autoProceed: true,
        restrictions: {
            maxFileSize: parseInt(uppy_maxFileSize),
            maxNumberOfFiles: parseInt(uppy_maxFile),
            minNumberOfFiles: 1,
            allowedFileTypes: ["image/*"],
        },
        locale: {
            strings: {
                dropPaste: uppy_drop_string,
                browse: uppy_browse_string,
            }
        }
    }).use(Dashboard, {
        target: "#ipool_dropzone",
        inline: true,
        width: 1000,
        note: uppy_note,
        replaceTargetContent: true,
        showProgressDetails: true,
    }).use(XHRUpload, {
        endpoint: "file/store",
        fieldName: 'file',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});


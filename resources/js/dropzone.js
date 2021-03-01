const Uppy = require('@uppy/core');
const XHRUpload = require('@uppy/xhr-upload');
const Dashboard = require('@uppy/dashboard');

$(document).ready(function () {
    const uppy_note = $('#irob_dropzone').attr('data-note'),
        uppy_drop_string = $('#irob_dropzone').attr('data-drop'),
        uppy_browse_string = $('#irob_dropzone').attr('data-browse');
    const uppy = new Uppy({
        debug: false,
        autoProceed: true,
        restrictions: {
            maxFileSize: 2500000,
            maxNumberOfFiles: 5,
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
        target: "#irob_dropzone",
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


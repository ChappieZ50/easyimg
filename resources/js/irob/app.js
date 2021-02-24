require('./bootstrap');
import axios from 'axios';
import 'bootstrap/dist/js/bootstrap.bundle'
import Swal from 'sweetalert2'

const feather = require('feather-icons');
$(document).ready(function () {
    feather.replace();

    /* Ban / Unban */
    $('#ban').on('click',function(){
        let id = $(this).attr('data-id');
        Swal.fire({
            title:"Are you sure?",
            text:"This user will be banned",
            icon:"error",
            confirmButtonText: "Yes,Ban",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            confirmButtonColor: '#ff6258',
        }).then(function(result){
            if(result.isConfirmed){
                axios.post(window.routes.user_status,{
                    status:false,
                    user:id,
                }).then(response => {
                    if (response.status) {
                        Swal.fire({
                            title: "User Banned",
                            icon: "success",
                            cancelButtonText: 'Close',
                        }).then(function(){
                            window.location.reload();
                        });
                    }else{
                        Swal.fire({
                            title: "Something wrong",
                            icon: "error",
                            cancelButtonText: 'Close',
                        });
                    }
                });
            }
        });
    });
    $('#unban').on('click', function () {
        let id = $(this).attr('data-id');
        Swal.fire({
            title: "Are you sure?",
            text: "This user will be unbanned",
            icon: "info",
            confirmButtonText: "Yes,Unban",
            cancelButtonText: "Cancel",
            showCancelButton: true,
            confirmButtonColor: '#19d895',
        }).then(function (result) {
            if (result.isConfirmed) {
                axios.post(window.routes.user_status, {
                    status: true,
                    user: id,
                }).then(response => {
                    if(response.status){
                        Swal.fire({
                            title:"User Unbanned",
                            icon:"success",
                            cancelButtonText:'Close',
                        }).then(function(){
                            window.location.reload();
                        });
                    }else{
                        Swal.fire({
                            title: "Something wrong",
                            icon: "error",
                            cancelButtonText: 'Close',
                        });
                    }
                });
            }
        });
    });
});

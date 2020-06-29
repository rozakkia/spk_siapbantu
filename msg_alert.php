<?php
$msg_alert ="<script type='text/javascript'>
            setTimeout(function () {  
            swal.fire({
                title: '$msg_title',
                icon: '$msg_type',
                timer: 2500,
                showConfirmButton: false
            });
            },10); 
            window.setTimeout(function(){ 
                $url_redirect
            } ,2500);   
            </script>
        ";
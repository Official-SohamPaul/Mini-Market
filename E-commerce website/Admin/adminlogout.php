<?php

    session_start();
    session_destroy();

    echo"
    <script>
        alert('Successfully loged out....');
        window.location.replace('adminlogin.html');
    </script>
    ";


?>
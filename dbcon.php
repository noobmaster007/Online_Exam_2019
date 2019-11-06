<?php
$connection=new mysqli(
    'localhost',
    'root', //username
    '', //password
    'onlineproject' // database name
)or die("Could not connect to mysql".mysqli_error($connection));
?>
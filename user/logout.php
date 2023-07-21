<?php

@include 'config.php';

session_start();
session_unset();
session_destroy();
session_abort();

header('location:../admin/login.php');

?>
<?php

session_start();

// default parameters, if not passed
$fmurl = ''; // enter the address of the server hosting webdirect
$fmfile = 'WebDirect_Params'; // enter the default file to open

if (isset($_GET['fmurl'])) {
    $fmurl = $_GET['fmurl'];
}
if (isset($_GET['fmfile'])) {
    $fmfile = $_GET['fmfile'];
}


// store all GET paramters in a session
if (isset($_GET) && count($_GET) > 0) {
    $_SESSION['get_requests'] = $_GET;

}

// redirect to WebDirect Session
header('Location: http://' . $fmurl . '/fmi/webd#' . $fmfile );

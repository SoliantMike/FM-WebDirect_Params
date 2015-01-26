<?php

session_start();

// only write to file if we get the correct parameter "file_uuid"
if (isset($_GET['file_uuid']) && strlen($_GET['file_uuid']) > 0) {
    // save temp file with uuid from server. sanitize the file_uuid parameter
    $filename_string = filter_var($_GET['file_uuid'], FILTER_SANITIZE_STRING);
    // add extension for writing
    $filename = $filename_string . '.txt';

    // set session variables to a string to write
    //initialize string
    $string = '';
    // set each parameter as local variable
    foreach ($_SESSION['get_requests'] as $key => $value) {
        if ($key == 'fmurl' || $key == 'fmfile') {
            // do not store these two parameters
        } else {

            // store as variables
            $string .= '$' . urlencode($key) . ' = "' . urlencode($value) . '"; ';
        }
    }

    // write the file to temp
    $fn = '/tmp/' . $filename;
    if ($fn) {
        $f = fopen($fn, 'w+');
        if ($f) {
            $fw = fwrite($f, $string);
            if ($fw) {
                echo 'wrote file.'; // . $fn
                // once file is written, destroy session
                session_destroy();
                
            } else {
                echo 'write error';
            }
        } else {
            echo 'open error';
        }
    } else {
        echo 'file error';
    }
} else {

    exit('nothing to do.');
}

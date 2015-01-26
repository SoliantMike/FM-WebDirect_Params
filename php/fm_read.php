<?php

// check for required parameter, should match the UUID passed in fm write file.
if(isset($_GET['file_uuid']) && strlen($_GET['file_uuid'])>0 ){
    
    $filename_string = filter_var($_GET['file_uuid'], FILTER_SANITIZE_STRING);
    
    $fn = '/tmp/'.$filename_string.'.txt';

    $fr = fopen($fn, "r") or die("Unable to open file!");
    echo fread($fr, filesize($fn));
    fclose($fr);

    unlink($fn);  // remove the file once read

} else {
    
    exit('Error: No file.');
    
}

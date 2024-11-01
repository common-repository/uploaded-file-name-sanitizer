<?php
/*
Plugin Name: Uploaded file name sanitizer
Plugin URI: http://dev.liudas.eu/uploaded-file-name-sanitizer
Description: Replaces chars which are not in 'a-z', '0-9' and ' '(space) range.
Version: 1.0
Author: devliudaseu
Author URI: http://dev.liudas.eu/
License: GPLv2
*/

function sanitize_name_devliudaseu( $filename ) {
    $info = pathinfo( $filename );
    $ext  = empty( $info['extension'] ) ? '' : '.' . $info['extension'];
    $name = basename( $filename, $ext );
    $name = preg_replace( '/[^a-z0-9_ ]/i', '-', $name );
    return $name . $ext;
}
add_filter( 'sanitize_file_name', 'sanitize_name_devliudaseu', 10 );
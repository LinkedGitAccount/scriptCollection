<?php
//add this script to functions.php in wordpress theme file editor
// Custom Sccript - Load Jquery from Google CDN
if( !is_admin()){ 
    $url = 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js'; 
    $test_url = @fopen($url,'r'); 
    if($test_url !== false) { 
        function load_external_jQuery() {
            wp_deregister_script('jquery'); 
            wp_register_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js'); 
            wp_enqueue_script('jquery'); 
        }
        add_action('wp_enqueue_scripts', 'load_external_jQuery'); 
    } else {
        function load_local_jQuery() {
            wp_deregister_script('jquery'); 
            wp_register_script('jquery', get_bloginfo('template_url').'/js/jquery-3.6.0.min.js', __FILE__, false, '3.6.0', true); 
            wp_enqueue_script('jquery'); 
        }
    add_action('wp_enqueue_scripts', 'load_local_jQuery'); 
    }
}

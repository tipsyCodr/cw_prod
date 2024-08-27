<?php
// application/helpers/matrimonial_helper.php
if (!function_exists('matrimonial_search_filter')) {
    function matrimonial_search_filter() {
        // Get CI instance
        $CI = &get_instance();
        // Load the view
        $CI->load->view('matrimonial_views/matrimonial_search_filter');
    }
}

?>

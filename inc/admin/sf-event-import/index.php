<?php 
/**
 * Salesforce Event import
 * 
 * @author Mike
 */

add_action('admin_menu', 'pp_register_sf_event_import_page');

function pp_register_sf_event_import_page() {
  add_submenu_page( 
    'edit.php?post_type=product',   //or 'options.php'
    __('SF Event Import', 'pp'),
    __('SF Event Import', 'pp'),
    'manage_options',
    'sf-event-import-page',
    'pp_event_import_page_callback',
  );
}

function pp_event_import_page_callback() {
  ?>
  <div id="PP_EVENT_IMPORT_PAGE">
    <h2><?php _e('Salesforce Event Import Page 📅', 'pp') ?></h2>
    <div class="container" id="PP_EVENT_IMPORT_PAGE_CONATAINER">

    </div>
  </div> <!-- #PP_EVENT_IMPORT_PAGE -->
  <?php
}

add_action('wp_ajax_pp_ajax_get_sf_junctions_object', 'pp_ajax_get_sf_junctions_object');
add_action('wp_ajax_pp_ajax_get_sf_junctions_object', 'pp_ajax_get_sf_junctions_object');
function pp_ajax_get_sf_junctions_object() {
  wp_send_json(ppsf_get_junctions());
}
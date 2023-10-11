<?php 
/**
 * Import members salesforce
 * 
 * @since 1.0.0
 * @version 1.0.0
 */

function pp_salesforce_import_members_submenu_page_register() {
  add_submenu_page( 
		'edit.php?post_type=members',
		__('Import Members', 'pp'),
		__('Import Members', 'pp'),
		'manage_options',
		'members-sf-import',
		'pp_salesforce_import_members_page_callback',
	);
}

add_action('admin_menu', 'pp_salesforce_import_members_submenu_page_register');

function pp_salesforce_import_members_page_callback() {
  pp_load_template('import-members-sf-page');
}
<?php 
/**
 * Users Salesforce Sync
 * 
 * @since 1.0.0
 * @author Mike
 */

function pp_user_register_column( $column ) {
  $column['pull_sf_user_data'] = __('Pull user data (from Salesforce)', 'pp');
  return $column;
}
add_filter( 'manage_users_columns', 'pp_user_register_column' );

function pp_user_column_value( $val, $column_name, $user_id ) {
  switch ($column_name) {
    case 'pull_sf_user_data' :
      ob_start();
      ?>
      <button class="button" data-userid="<?php echo $user_id; ?>"><?php _e('Pull', 'pp') ?></button>
      <p>Last updated #NA</p>
      <?php
      return ob_get_clean();
  }

  return $val;
}
add_filter( 'manage_users_custom_column', 'pp_user_column_value', 10, 3 );

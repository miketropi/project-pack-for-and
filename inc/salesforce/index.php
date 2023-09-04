<?php 
/**
 * Salesforce
 */

function pp_salesforce_config() {
  $arr = [
    'endpoint' => 'https://andau--datacolada.sandbox.my.salesforce.com',
    'access_token' => get_field('salesforce_api_access_token', 'option'),
  ];

  return $arr;
}

// require(__DIR__ . '/members-import/index.php');
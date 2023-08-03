<?php 
/**
 * Salesforce API 
 * 
 * @since 1.0.0 
 */

function ppsf_api_info() {
  return [
    'endpoint' => get_field('salesforce_endpoint_url', 'option'),
    'version' => get_field('salesforce_api_version', 'option')
  ];
}

function ppsf_token() {
  return get_field('salesforce_api_access_token', 'option');
}

function ppsf_remote_post($url, $args = []) {
  $_default = [
    'method' => 'GET',
    'headers' => [
      'Authorization' => 'Bearer ' . ppsf_token(),
    ]];

  $_args = wp_parse_args($args, $_default);
  return wp_remote_post($url, $_args);
}

/**
 * Get user infor by Salesforce User ID
 * 
 * @param string $uid
 */
function ppsf_get_user($uid) {
  list(
    'endpoint' => $endpoint,
    'version' => $version,
  ) = ppsf_api_info();

  $url = $endpoint . '/services/data/'. $version .'/sobjects/User/' . $uid;
  $response = ppsf_remote_post($url);
  return json_decode( wp_remote_retrieve_body( $response ), true );
}

/**
 * Object Account (label: Organisation)
 * Get Account information by Account ID
 * 
 * @param string $accountID
 */
function ppsf_get_account($accountID) {
  list(
    'endpoint' => $endpoint,
    'version' => $version,
  ) = ppsf_api_info();

  $url = $endpoint . '/services/data/'. $version .'/sobjects/Account/' . $accountID;
  $response = ppsf_remote_post($url);
  return json_decode( wp_remote_retrieve_body( $response ), true );
}
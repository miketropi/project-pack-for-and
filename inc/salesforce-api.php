<?php 

define('SF_ENDPOINT', 'https://andau--datacolada.sandbox.my.salesforce.com');
define('SF_API_VER', 'v53.0');

function ppsf_token() {
  return get_field('salesforce_api_access_token', 'option');
}

function ppsf_get_user($uid) {
  $url = SF_ENDPOINT . '/services/data/'. SF_API_VER .'/sobjects/User/' . $uid;
  $response = wp_remote_post($url, [
    'method' => 'GET',
    'headers' => [
      'Authorization' => 'Bearer ' . ppsf_token(),
    ]
  ]);

  return json_decode( wp_remote_retrieve_body( $response ), true );
}
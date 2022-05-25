<?php
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_script('rest-ajax', plugin_dir_url(__FILE__) . '/table_rest_ajax.js', '', '', true);
});
  
class WPC_REST extends WP_REST_Controller
  {
  
    public function register_routes(){
      
      register_rest_route('wpc/v1', '/tabledata', [
        'methods' => WP_REST_Server::READABLE,
        'callback' => [$this, 'get_store_rest']
      ]);
  
    }
  
    public function get_store_rest( $request ){
        
      function tablazat(){
        $csv = array_map('str_getcsv', file('https://docs.google.com/spreadsheets/d/e/2PACX-1vRxJQBOx0LOVmIIEiI6G51bC17y9VUYayZMvToBA-d8gXX9uk707LUNYZqq6QfJ7i7mjmpGxErtLMkx/pub?output=csv'));
        return $csv;
      }
      
      $api_response = json_encode(tablazat());
        
        $response = new WP_REST_Response($api_response);
  
        $response->set_status( 200 );
  
        return $response;
    }
  
  }
  
add_action('rest_api_init', function () {
    if (class_exists('WPC_REST')) {
      $controller = new WPC_REST();
      $controller->register_routes();
    }
});
<?php

/**
 * Plugin Name:       GOOGLE táblázat megjelenítése
 * Description:       Táblázat beillesztése Google spreadsheet-ből, automata frissítéssel és XLSX letöltési lehetőséggel. Shortcode: [icont_excel_table]
 * Version:           1.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Dropka Ádám
 * Author URI:        https://dropkaa.hu/
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

require_once ('cors.php');
require_once 'table_rest_api.php';

//CALL JS JUST TABLES PAGE
function custom_plugin_assets() {
    if (is_page("teszteles")){
        // Enqueue my scripts.
        wp_enqueue_script( 'ajax_googleapis', '//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', array(), null );
        //wp_enqueue_script( 'table_show_script', plugin_dir_url(__FILE__) . 'table_rest_ajax.js', array (), null, true);
    }
}
add_action( 'wp_enqueue_scripts', 'custom_plugin_assets' );

// function that runs when shortcode is called
function icont_excel_table() { 
    // APP
	ob_start();
    
        echo '<div class="google_tablazat" id="google_tablazat"></div>';

	return ob_get_clean();
 }
 // register shortcode: icont_excel_table
 add_shortcode('icont_excel_table', 'icont_excel_table');
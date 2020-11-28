<?php

/**
 * Fired during plugin deactivation
 *
 * @link       selimrezaswadhin
 * @since      1.0.0
 *
 * @package    Advance_Plugin
 * @subpackage Advance_Plugin/includes
 */

/**
 * Fired during plugin deactivation.
 *
 * This class defines all code necessary to run during the plugin's deactivation.
 *
 * @since      1.0.0
 * @package    Advance_Plugin
 * @subpackage Advance_Plugin/includes
 * @author     Selim Reza Swadhin <selimrezaswadhin@gmail.com>
 */
class Advance_Plugin_Deactivator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */

	private $table_activator;

	//activate_advance_plugin() import
	public function __construct($activatorr){
	    $this->table_activator = $activatorr;
    }

	public function deactivate() {
        global $wpdb;

        $wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->Book_Table_Prefix());
        $wpdb->query("DROP TABLE IF EXISTS ".$this->table_activator->Book_Table_Shelf_Prefix());

        //delete page when plugin deactive
        $get_data = $wpdb->get_row(
            $wpdb->prepare("select ID from ".$wpdb->prefix."posts where post_name = %s", 'book_tool')
        );
        $page_id = $get_data->ID;
        if ($page_id > 0){
            wp_delete_post($page_id, true);
        }
	}

}

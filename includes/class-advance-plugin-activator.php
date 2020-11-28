<?php

/**
 * Fired during plugin activation
 *
 * @link       selimrezaswadhin
 * @since      1.0.0
 *
 * @package    Advance_Plugin
 * @subpackage Advance_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Advance_Plugin
 * @subpackage Advance_Plugin/includes
 * @author     Selim Reza Swadhin <selimrezaswadhin@gmail.com>
 */
class Advance_Plugin_Activator
{

    /**
     * Short Description. (use period)
     *
     * Long Description.
     *
     * @since    1.0.0
     */
    public function activate()
    {
        /*$table_query = "CREATE TABLE wp_book_table (
                         id int(11) NOT NULL AUTO_INCREMENT,
                         name varchar(200) DEFAULT NULL,
                         amount int(11) DEFAULT NULL,
                         description text DEFAULT NULL,
                         book_image varchar(200) DEFAULT NULL,
                         language varchar(200) DEFAULT NULL,
                         status int(11) NOT NULL DEFAULT 1,
                         created_at timestamp NOT NULL DEFAULT current_timestamp(),
                         PRIMARY KEY (id)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";*/

       //wp_book_table
        $table_query = "CREATE TABLE ".$this->Book_Table_Prefix()." (
                         id int(11) NOT NULL AUTO_INCREMENT,
                         name varchar(200) DEFAULT NULL,
                         amount int(11) DEFAULT NULL,
                         description text DEFAULT NULL,
                         book_image varchar(200) DEFAULT NULL,
                         language varchar(200) DEFAULT NULL,
                         shelf_id int(11) DEFAULT NULL,
                         status int(11) NOT NULL DEFAULT 1,
                         created_at timestamp NOT NULL DEFAULT current_timestamp(),
                         PRIMARY KEY (id)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($table_query);

        //wp_book_table_shelf
        $shelf_query = "CREATE TABLE ".$this->Book_Table_Shelf_Prefix()." (
                         id int(11) NOT NULL AUTO_INCREMENT,
                         shelf_name varchar(200) NOT NULL,
                         capacity int(11) NOT NULL,
                         shelf_location varchar(200) NOT NULL,
                         status int(11) NOT NULL DEFAULT 1,
                         created_at timestamp NOT NULL DEFAULT current_timestamp(),
                         PRIMARY KEY (id)
                        ) ENGINE=InnoDB DEFAULT CHARSET=utf8";
        dbDelta($shelf_query);

        //data insert in table
        global $wpdb;
        $insert_query = "insert into ".$this->Book_Table_Shelf_Prefix()." (shelf_name,capacity,shelf_location,status) values ('shelf1',230,'corner',1),('shelf2',100,'left corner',1)";//get table name Book_Table_Shelf_Prefix()
        $wpdb->query($insert_query);

        // create page when plugin active
        $post_arr_data = array(
            'post_type'    => 'page',
            'post_title'    => 'Book Tool',
            'post_name'     => 'book_tool',
            'post_content'  => "Book Tool Page",
            'post_status'   => 'publish',
            'post_author'   => 1
        );
        wp_insert_post($post_arr_data);
    }

    //create prefix
    public function Book_Table_Prefix()
    {
       global $wpdb;
       return $wpdb->prefix ."book_table";//wp_ cut
    }

    public function Book_Table_Shelf_Prefix(){
        global $wpdb;
        return $wpdb->prefix . "book_table_shelf";
    }
}

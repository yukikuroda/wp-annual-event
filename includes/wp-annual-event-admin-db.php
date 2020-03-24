<?php
class Annual_Event_Admin_Db {
  private $table_name;

  public function __construct() {
    global $wpdb;
    $this->table_name = $wpdb->prefix . 'annual_event';

    $this->create_table();
  }

private function create_table() {
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

  $prepare = $wpdb->prepare( "SHOW TABLES LIKE %s", $this->table_name );
  $is_db_exists = $wpdb->get_var( $prepare );
  var_dump( $is_db_exists );

  $query  = "";
  $query .= "CREATE TABLE " .$this->table_name . "(";
  $query .= "id MEDIUMINT(8) NOT NULL AUTO_INCREMENT PRIMARY KEY";
  $query .=");";

  // dbDelta( $query );
  }
}

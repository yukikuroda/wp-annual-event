<?php
/*
Plugin Name: Sample Plugin
Plugin URI:
Description: プラグインの説明
Version: 1.0.0
Author: 作成者
Author URI:
License: GPLv2 or later
*/

require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-annual-event-admin-db.php' );

/**
 * Base Class
 *
 * @author  作成者
 * @version 1.0.0
 * @since   1.0.0
 */
class Annual_Event {
	public function __construct() {
		if( is_admin() ){
    add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }
	}

	public function admin_menu () {
		add_menu_page(
			'タイトル',
			'メニュー名',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);
		add_submenu_page(
			__FILE__,
			'リスト',
			'リスト',
			'manage_options',
			plugin_basename( __FILE__ ),
			array( $this, 'list_page_render' )
		);
		add_submenu_page(
			__FILE__,
			'サブメニュータイトル2',
			'サブメニュー名2',
			'manage_options',
			plugin_dir_path( __FILE__ ) . 'includes/wp-annual-event-post.php',
			array( $this, 'post_page_render' )
		);
	}

	public function list_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-annual-event-list.php' );
		new Annual_Event_List();
	}

	public function post_page_render () {
		require_once( plugin_dir_path( __FILE__ ) . 'includes/wp-annual-event-post.php' );
		new Annual_Event_Post();
	}
}

new Annual_Event();

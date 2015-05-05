<?php
/**
 * Plugin Name: Writing Guide
 * Plugin URI: http://katsarov.info/writing-guide
 * Description: This plugin allows you to write a writing guide for your users
 * Version: 1.0
 * Author: Kristiyan Katsarov
 * Author URI: http://katsarov.info
 * License: GPL2
 */
 
class WGuide {
	
	public function __construct() {
		add_action(	'admin_menu', array(__CLASS__,'addSettings'));
		add_action( 'admin_enqueue_scripts', array(__CLASS__,'registerScripts') );
		add_action( 'wp_ajax_get_writing_guide', array(__CLASS__,'getWritingGuideAjax') );
	}
	
	/**
	 * Adds settings sub-page in wordpress settings
	 */
	public function addSettings() {
		add_options_page('Writing Guide', 'Writing Guide', 'manage_options', 'my-plugin.php', array(__CLASS__,'showSettings'));
	}
	
	/**
	 * Shows settings page
	 */
	public function showSettings() {
		include('settings.php');
	}
	
	/** 
	 * Registers JS and CSS
	 */
	public function registerScripts() {
		wp_register_style( 'main_css', plugin_dir_url( __FILE__ ) . 'main.css'  );
        wp_enqueue_style( 'main_css' );
		wp_enqueue_script( 'main_js', plugin_dir_url( __FILE__ ) . 'main.js', 'jquery', null, true );
	}
	
	/** 
	 * Gets the content of writing guide
	 */
	public static function getWritingGuide() {
		return get_option('wp_writing_guide_content', 'Your guide goes here...');
	}
	
	/**
	 * Ajax handler for getting the writing guide
	 */
	public static function getWritingGuideAjax() {
		echo self::getWritingGuide();
		die();
	}
	/** 
	 * Sets the content of writing guide
	 */
	public static function setWritingGuide($content) {
		update_option('wp_writing_guide_content', $content);
	}
}

new WGuide;
?>

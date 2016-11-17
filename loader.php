<?php
/*
 Plugin Name: BuddyForms Custom Post Types
 Plugin URI: http://buddyforms.com/downloads/buddyforms-custom-post-types/
 Description: Crete new Custom Post Typed Form BuddyForms Forms
 Version: 0.1
 Author: Sven Lehnert
 Author URI: https://profiles.wordpress.org/svenl77
 License: GPLv2 or later
 Network: false

 *****************************************************************************
 *
 * This script is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
 *
 ****************************************************************************
 */


class BuddyForms_Custom_Post_Types {

	public function __construct() {
		$this->init_hook();
		$this->load_constants();

		// Load all needed files
		add_action( 'init', array( $this, 'includes' ), 1 );

		// Load the plugin translation files
		add_action( 'init', array( $this, 'load_plugin_textdomain' ), 10, 1 );

		// Register the Group Type Taxonomies for the relationships
		add_action( 'init', array( $this, 'register_taxonomies' ), 10, 2 );
	}

	/**
	 * Defines buddyforms_cpt_init action
	 *
	 */

	public function init_hook() {
		do_action( 'buddyforms_cpt_init' );
	}

	/**
	 * Defines constants needed throughout the plugin.
	 *
	 */

	public function load_constants() {

		if ( ! defined( 'BUDDYFORMS_CPT_INSTALL_PATH' ) ) {
			define( 'BUDDYFORMS_CPT_INSTALL_PATH', dirname( __FILE__ ) . '/' );
		}

		if ( ! defined( 'BUDDYFORMS_CPT_INCLUDES_PATH' ) ) {
			define( 'BUDDYFORMS_CPT_INCLUDES_PATH', BUDDYFORMS_CPT_INSTALL_PATH . 'includes/' );
		}
	}

	/**
	 * Includes files needed by buddyforms
	 *
	 * @package buddyforms
	 * @since 0.1-beta
	 */

	public function includes() {

		require_once( BUDDYFORMS_CPT_INCLUDES_PATH . 'custom-post-types.php' );
		require_once( BUDDYFORMS_CPT_INCLUDES_PATH . 'form-elements.php' );

	}

	/**
	 * Loads the textdomain for the plugin
	 *
	 * @package buddyforms
	 * @since 0.1-beta
	 */

	public function load_plugin_textdomain() {

		load_plugin_textdomain( 'buddyforms', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	}

	function register_taxonomies() {
		buddyforms_create_post_types();
	}

}

new BuddyForms_Custom_Post_Types;
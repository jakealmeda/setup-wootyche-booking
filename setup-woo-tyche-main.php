<?php
/**
 * Plugin Name: Setup Woo & Tyche Booking & Appointment
 * Description: Displays daily or weekly schedules that can be booked on the spot. Eliminates the need to go to the actual product page.
 * Version: 1.0
 * Author: Jake Almeda
 * Author URI: http://smarterwebpackages.com/
 * Network: true
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}


// include files
require_once( 'lib/setup_pull_all_classes.php' );
require_once( 'lib/setup_wtba_acf_register.php' );


class SetupWooTycheBookingAppointment {

	// set days of the week
	private $weekdays = array( 'sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday' );


	// main function
	private function main_display( $params = array() ) {

		extract( shortcode_atts( array(
			'category' 			=> 'category',
			'showdays' 			=> 'showdays',
		), $params ) );

		// pull all classes
		$class = new SetupWTBAPullAllClasses();
		$classes = $class->setup_pull_all_classes( $params[ 'category' ] );

	}


	// simply return this plugin's main directory
	public function setup_plugin_dir_path() {

		return plugin_dir_path( __FILE__ );

	}


	// construct
	public function __construct() {

		//echo $this->main_display();
		add_shortcode( 'swp_bookings', array( $this, 'main_display') );

	}

}

$acf_block = new SetupWTBA_ACFBlocks();
$again = new SetupWooTycheBookingAppointment();
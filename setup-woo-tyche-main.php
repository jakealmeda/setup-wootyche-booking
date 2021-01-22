<?php
/**
 * Plugin Name: Setup WooCommerce & Tyche Software Booking & Appointment
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

class SetupWooTycheBookingAppointment {


	function __construct() {
		echo $this->display_this();
	}

}

$again = new SetupWooTycheBookingAppointment();
<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

class SetupWTBA_ACFBlocks {

	/**
	 * Add a block category for "Setup" if it doesn't exist already.
	 * @ param array $categories Array of block categories.
	 * @ return array
	 */
	public function setup_wtba_block_categ( $categories ) {

	    $category_slugs = wp_list_pluck( $categories, 'slug' );

	    return in_array( 'setup', $category_slugs, TRUE ) ? $categories : array_merge(
	        array(
	            array(
	                'slug'  => 'setup',
	                'title' => __( 'Setup', 'mydomain' ),
	                'icon'  => null,
	            ),
	        ),
	        $categories
	    );

	}


	/**
	 * LOG (Custom Blocks)
	 * Register Custom Blocks
	 */
	public function setup_wtba_block_template() {

		$x = new SetupWooTycheBookingAppointment();

	    $blocks = array(

	        'pull' => array(
	            'name'                  => 'setup_booking_appointment_display',
	            'title'                 => __( 'Setup Booking & Appointment Display' ),
	            'render_template'       => $x->setup_plugin_dir_path().'partials/blocks/setup_wtba_main_block.php',
	            'category'              => 'setup',
	            'icon'                  => 'calendar-alt',
	            'mode'                  => 'edit',
	            'keywords'              => array( 'booking', 'appointment', 'meeting', 'schedule' ),
	            'supports'              => [
	                'align'             => false,
	                'anchor'            => true,
	                'customClassName'   => true,
	                'jsx'               => true,
	            ],
	        ),

	    );

	    // Bail out if function doesn’t exist or no blocks available to register.
	    if ( !function_exists( 'acf_register_block_type' ) && !$blocks ) {
	        return;
	    }

		foreach( $blocks as $block ) {
			acf_register_block_type( $block );
		}
	  
	}


	public function __construct() {

		// register block if doesn't exists
		add_filter( 'block_categories', array( $this, 'setup_wtba_block_categ' ) );

		// register block template
		add_action( 'acf/init', array( $this, 'setup_wtba_block_template' ) );

	}

}
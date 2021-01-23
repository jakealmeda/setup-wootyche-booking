<?php

if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $block_css, $pid;

// add more class selectors here
$classes = array();

$classes = array_merge( $classes, explode( ' ', $block_css ) );

echo '<h3>jakes view</h3>';
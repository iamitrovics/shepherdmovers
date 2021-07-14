<?php
/**
 * Custom image sizes
 *
 * @package understrap
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// general
add_image_size('preview-image', 300, 200, TRUE);
add_image_size('full-image', 1920, 9999, FALSE);
add_image_size('inner-image', 1920, 450, TRUE);

// Home
add_image_size('service-image', 600, 400, TRUE);

// City
add_image_size('city-image', 1600, 950, TRUE);
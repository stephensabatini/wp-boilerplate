<?php
/**
 * Utilities
 *
 * The utility functions for this theme.
 *
 * @author Stephen Sabatini <info@stephensabatini.com>
 * @package Boilerplate\Utilities
 * @license MIT
 */

namespace Boilerplate\Utilities;

/**
 * Gets the estimated read time.
 *
 * Based off the rated at which the average human reads at. Many research
 * studies indicate that number is between 200-250 WPM. However, some results
 * indicate as low as 150. This is how we settled with 200 WPM.
 *
 * @return string $read_time Estimated amount of minutes to read the content.
 */
function get_the_read_time() {
	$text      = trim( wp_strip_all_tags( get_the_content() ) );
	$count     = preg_match_all( '~\s+~', "$text ", $m );
	$read_time = (string) intval( ceil( $count / 200 ) );
	return $read_time;
}

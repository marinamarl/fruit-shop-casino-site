<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined( 'ABSPATH' ) or die( 'Restricted access' );

global $gantry;
 
if ( !is_rtl() && ( $gantry->get( 'sidepanel-enabled' ) ) ) {
	$layout_type = 'sidepanel-layout';
} else if ( is_rtl() && $gantry->get( 'rtl-enabled' ) && ( $gantry->get( 'sidepanel-enabled' ) ) ) {
	$layout_type = 'rtlsidepanel-layout';
} else {
	$layout_type = 'standard-layout';
}

/* Load the layout based on settings */
include( dirname( __FILE__ ) . '/' . $layout_type . '-footer.php' );
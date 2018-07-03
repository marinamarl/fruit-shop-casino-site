<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrywidget' );

class GantryWidgetSidePLogo extends GantryWidget {
	var $short_name = 'sideplogo';
	var $wp_name = 'gantry_sideplogo';
	var $long_name = 'Gantry Side Panel Logo';
	var $description = 'Gantry Side Panel Logo Widget';
	var $css_classname = 'widget_gantry_sideplogo';
	var $width = 200;
	var $height = 400;

	function init() {
		register_widget( 'GantryWidgetSidePLogo' );
	}

	function render_widget_open( $args, $instance ) {
	}
	
	function render_widget_close( $args, $instance ) {
	}
	
	function pre_render( $args, $instance ) {
	}
	
	function post_render( $args, $instance ) {
	}

	function render( $args, $instance ) {
		global $gantry;
		
		ob_start();
		?>
		<div class="sideplogo-block">
			<a href="<?php echo home_url(); ?>" id="rt-sidelogo"></a>
		</div>
		<?php
		echo ob_get_clean();
	}
}

<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrywidget' );

class GantryWidgetBranding extends GantryWidget {
    var $short_name = 'branding';
    var $wp_name = 'gantry_branding';
    var $long_name = 'Gantry Branding';
    var $description = 'Gantry Branding Widget';
    var $css_classname = 'widget_gantry_branding';
    var $width = 200;
    var $height = 400;

    static function init() {
        register_widget( 'GantryWidgetBranding' );
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
	    <div id="<?php echo $this->id; ?>" class="rt-block rt-branding <?php echo $this->css_classname; ?> widget">
        	<a href="http://www.gantry-framework.org/" title="Gantry Framework" class="rt-powered-by"></a>
        </div>
	    <?php
	    echo ob_get_clean();
	}
}
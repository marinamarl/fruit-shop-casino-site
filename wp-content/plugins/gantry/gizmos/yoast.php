<?php
/**
 * @version   $Id: yoast.php 60800 2017-08-28 13:08:13Z jakub $
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2018 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrygizmo' );

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoYOAST extends GantryGizmo {

	var $_name = 'yoast';

	function isEnabled() {
		if( class_exists( 'WPSEO_Admin' ) ) {
			return true;
		}

		return false;
	}

	/**
	 *     Copyright (C) 2017 Jakub Baran
	 */

	function admin_init() {
		global $gantry, $pagenow, $wpseo_admin;

		if( isset( $pagenow ) && isset( $wpseo_admin ) ) {
			if ( $pagenow == 'admin.php' && ( isset( $_GET['page'] ) && $_GET['page'] === 'gantry-theme-settings' ) ) {
				remove_action('admin_enqueue_scripts', array( $wpseo_admin, 'config_page_scripts') );
			}

			if ( $pagenow == 'widgets.php' && $gantry->get('yoastwidgets-enabled') === '1') {
				remove_action('admin_enqueue_scripts', array( $wpseo_admin, 'config_page_scripts') );
			}
		}
	}
}

<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */

defined( 'GANTRY_VERSION' ) or die();

gantry_import( 'core.gantrygizmo' );
gantry_import( 'core.utilities.gantrymobiledetect' );

/**
 * @package     gantry
 * @subpackage  features
 */
class GantryGizmoStyleDeclaration extends GantryGizmo {

	var $_name = 'styledeclaration';
	
	function isEnabled(){
		global $gantry;
		$menu_enabled = $this->get('enabled');

		if (1 == (int)$menu_enabled) return true;
		return false;
	}

	function query_parsed_init() {
		global $gantry;
		$browser = $gantry->browser;

		// Logo
		$css = $this->buildLogo();

		// Less Variables
		$lessVariables = array(
			'accent-color1'               => $gantry->get('accent-color1',              '#4BA5AD'),
			'accent-color2'               => $gantry->get('accent-color2',              '#3A949F'),
			'accent-color3'               => $gantry->get('accent-color3',              '#318499'),
			'accent-color4'               => $gantry->get('accent-color4',              '#2C7799'),

			'pagesurround-type'           => $gantry->get('pagesurround-type',          'preset1'),
			'pagesurround-background'     => $gantry->get('pagesurround-background',    '#FAEFE8'),

			'headersurround-type'         => $gantry->get('headersurround-type',        'preset1'),
			'headersurround-background'   => $gantry->get('headersurround-background',  '#121212'),

			'sidepanel-textcolor'         => $gantry->get('sidepanel-textcolor',        '#807878'),
			'sidepanel-background'        => $gantry->get('sidepanel-background',       '#121212'),

			'header-textcolor'            => $gantry->get('header-textcolor',           '#FFFFFF'),
			'header-background'           => $gantry->get('header-background',          'transparent'),

			'top-textcolor'               => $gantry->get('top-textcolor',              '#FFFFFF'),
			'top-background'              => $gantry->get('top-background',             'transparent'),

			'utility-textcolor'           => $gantry->get('utility-textcolor',          '#FFFFFF'),
			'utility-background'          => $gantry->get('utility-background',         'transparent'),

			'showcase-textcolor'          => $gantry->get('showcase-textcolor',         '#FFFFFF'),
			'showcase-background'         => $gantry->get('showcase-background',        'transparent'),

			'feature-textcolor'           => $gantry->get('feature-textcolor',          '#FFFFFF'),
			'feature-background'          => $gantry->get('feature-background',         'transparent'),

			'mainbody-overlay'            => $gantry->get('mainbody-overlay',           'light'),

			'bottom-textcolor'            => $gantry->get('bottom-textcolor',           '#5D6E7F'),
			'bottom-background'           => $gantry->get('bottom-background',          '#FFFFFF'),

			'footer-textcolor'            => $gantry->get('footer-textcolor',           '#5D6E7F'),
			'footer-background'           => $gantry->get('footer-background',          '#FFFFFF'),

			'copyright-textcolor'         => $gantry->get('copyright-textcolor',        '#5D6E7F'),
			'copyright-background'        => $gantry->get('copyright-background',       'transparent')
		);

		// Section Background Images
		$positions  = array('pagesurround-custompagesurround-image', 'headersurround-customheadersurround-image', 'showcase-customshowcase-image', 'maintop-custommaintop-image');
		$source     = "";

		foreach ($positions as $position) {
			$data = $gantry->get($position, false) ? json_decode(str_replace("'", '"', $gantry->get($position))) : false; 
			if ($data) $source = $data->path;
			$lessVariables[$position] = $data ? 'url(' . $source . ')' : 'none';
		}

		$gantry->addInlineStyle($css);   

		$gantry->addLess('global.less', 'master.css', 7, $lessVariables);

		$this->_disableRokBoxForiPhone();

		// Responsive Layout Styling
		if (($gantry->get('layout-mode')=="fluidresponsive") or ($gantry->get('layout-mode')=="responsive")) {
			$gantry->addLess('mediaqueries.less');
			$gantry->addLess('menu-dropdown-direction.less');
		}
		if ($gantry->get('layout-mode')=="fluidresponsive") $gantry->addLess('grid-flexbox-fluid.less');
		if ($gantry->get('layout-mode')=="responsive") $gantry->addLess('grid-flexbox-responsive.less');

		// Fixed Layout Styling
		if ($gantry->get('layout-mode')=="960fixed")   $gantry->addLess('960fixed.less');
		if ($gantry->get('layout-mode')=="1200fixed")  $gantry->addLess('1200fixed.less');

		// RTL
		if ($gantry->get('rtl-enabled') && is_rtl()) $gantry->addLess('rtl.less', 'rtl.css', 8, $lessVariables);

		// Demo Styling
		if ($gantry->get('demo')) $gantry->addLess('demo.less', 'demo.css', 9, $lessVariables);

		// Chart Script
		if ($gantry->get('chart-enabled')) $gantry->addScript('chart.js');

		// Parallax Header
		$detect = new GantryMobileDetect();
		if ($gantry->get('headersurround-parallax')) {
			if (!$detect->isTablet() && !$detect->isMobile()) $gantry->addScript('rt-parallax.js');
		}

		// SidePanel Script
		if ($gantry->get('sidepanel-enabled')) {
			if (!$detect->isTablet() && !$detect->isMobile()) {
				$gantry->addScript('rokfixedsidebar.js');
			}
		}

		// Add inline css from the Custom CSS field
		$gantry->addInlineStyle($gantry->get('customcss'));
	}

	function buildLogo(){
		global $gantry;

		if ($gantry->get('logo-type')!="custom") return "";

		$source = $width = $height = "";

		$logo = str_replace("&quot;", '"', str_replace("'", '"', $gantry->get('logo-custom-image')));
		$data = json_decode($logo);

		if (!$data){
			if (strlen($logo)) $source = $logo;
			else return "";
		} else {
			$source = $data->path;
		}

		if(!is_ssl()) {
			if(substr($source, 0, 5) == 'https') {
				$source = str_replace('https', 'http', $source);
			}
		} else {
			if(substr($source, 0, 5) != 'https') {
				$source = str_replace('http', 'https', $source);
			}
		}

		$baseUrl = trailingslashit(site_url());

		if (substr($baseUrl, 0, strlen($baseUrl)) == substr($source, 0, strlen($baseUrl))){
			$file = trailingslashit(ABSPATH) . substr($source, strlen($baseUrl));
		} else {
			$file = trailingslashit(ABSPATH) . $source;
		}

		if (isset($data->width) && isset($data->height)){
			$width = $data->width;
			$height = $data->height;
		} else {
			$size = @getimagesize($file);
			$width = $size[0];
			$height = $size[1];
		}

		$source = str_replace(' ', '%20', $source);

		$output = "";
		$output .= "#rt-logo, #rt-sidelogo {background: url(".$source.") 50% 0 no-repeat !important;}"."\n";
		$output .= "#rt-logo, #rt-sidelogo {width: ".$width."px;height: ".$height."px;}"."\n";

		$file = preg_replace('/\//i', DIRECTORY_SEPARATOR, $file);

		return (file_exists($file)) ? $output : '';
	}

	function _disableRokBoxForiPhone() {
		global $gantry;

		if ($gantry->browser->platform == 'iphone' || $gantry->browser->platform == 'android') {
			$gantry->addInlineScript("window.addEvent('domready', function() {\$\$('a[rel^=rokbox]').removeEvents('click');});");
		}
	}
}
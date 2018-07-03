<?php
/**
 * @version   1.4 July 24, 2017
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2017 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
// no direct access
defined('ABSPATH') or die('Restricted access');

global $gantry;

// get the current preset
$gpreset = str_replace(' ','',strtolower($gantry->get('name')));
?>
<!doctype html>
<html xml:lang="<?php echo $gantry->language; ?>" lang="<?php echo $gantry->language;?>" >
	<head>
		<?php if ($gantry->get('layout-mode') == '960fixed') : ?>
		<meta name="viewport" content="width=960px">
		<?php elseif ($gantry->get('layout-mode') == '1200fixed') : ?>
		<meta name="viewport" content="width=1200px">
		<?php else : ?>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php endif; ?>

		<?php
		$gantry->displayHead();

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

		$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
		$gantry->addLess('error.less', 'error.css', 4, $lessVariables);

		// Scripts
		if ($gantry->browser->name == 'ie'){
			if ($gantry->browser->shortversion == 8){
				$gantry->addScript('html5shim.js');
				$gantry->addScript('placeholder-ie.js');
			}
			if ($gantry->browser->shortversion == 9){
				$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
				$gantry->addScript('placeholder-ie.js');
			}
		}
		if ($gantry->get('layout-mode', 'responsive') == 'responsive') $gantry->addScript('rokmediaqueries.js');
		?>
	</head>
	<body <?php echo $gantry->displayBodyTag(); ?>>
		<div id="rt-page-surround" class="rt-error-page">
			<div class="rt-container">
			<?php /** Begin Header Surround **/ ?>
			<header id="rt-header-surround">
				<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
				<div id="rt-header">
						<div class="rt-inner-container">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Header **/ endif; ?>

				<?php /** Begin Showcase **/ ?>
				<div id="rt-top">
					<div class="rt-inner-container">
						<div class="rt-grid-12">
							<div class="rt-error-container">
								<div class="rt-error-header">
									<div class="rt-error-code">404</div>
									<div class="rt-error-code-desc"><?php _re('Page not found'); ?></div>
								</div>
								<div class="rt-error-content">
									<div class="rt-error-title"><?php _re('Oh my gosh! You found it!!!'); ?></div>
									<div class="rt-error-message"><?php _re("Looks like the page you're trying to visit doesn't exist.<br />Please check the URL and try your luck again."); ?></div>
									<div class="rt-error-button"><a href="<?php echo home_url(); ?>" class="readon"><span><?php _re('Take Me Home'); ?></span></a></div>
								</div>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Showcase **/ ?>
			</header>
			<?php /** End Header Surround **/ ?>

			<?php /** Begin Footer Section **/ ?>
			<footer id="rt-footer-surround">
				<div id="rt-footer">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('footer','standard','standard'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Footer **/ ?>
				</div>
			</footer>
			<?php /** End Footer Surround **/ ?>
		</div>
		</div>
		<?php $gantry->displayFooter(); ?>
	</body>
</html>
<?php
$gantry->finalize();
?>
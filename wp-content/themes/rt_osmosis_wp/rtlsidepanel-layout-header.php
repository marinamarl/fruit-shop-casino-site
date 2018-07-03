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
<?php /* Head */
	$gantry->displayHead();
?>
<?php /* Force IE to Use the Most Recent Version */ if ($gantry->browser->name == 'ie') : ?>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<?php endif; ?>

<?php
	//$gantry->addStyle('grid-responsive.css', 5);
	$gantry->addLess('bootstrap.less', 'bootstrap.css', 6);
	if ($gantry->browser->name == 'ie'){
		if ($gantry->browser->shortversion == 8){
			$gantry->addScript('html5shim.js');
			$gantry->addScript('canvas-unsupported.js');
			$gantry->addScript('placeholder-ie.js');
		}
		if ($gantry->browser->shortversion == 9){
			$gantry->addInlineScript("if (typeof RokMediaQueries !== 'undefined') window.addEvent('domready', function(){ RokMediaQueries._fireEvent(RokMediaQueries.getQuery()); });");
			$gantry->addScript('placeholder-ie.js');
		}
	}
	if ($gantry->get('layout-mode', 'responsive') == 'responsive') $gantry->addScript('rokmediaqueries.js');
?>

<?php /* Parallax Header Inline Script */
$gantry->addInlineScript("var RokScrollEvents = [], RTScroll = function(){
    if (!RokScrollEvents.length) window.removeEvent('scroll', RTScroll);
    else {
        for (var i = RokScrollEvents.length - 1; i >= 0; i--){
            RokScrollEvents[i]();
        };
    }
};
window.addEvent('load', function(){
	window.addEvent('scroll', RTScroll);
	RTScroll();
});");
?>

</head>
<body <?php echo $gantry->displayBodyTag(); ?>>
	<div id="rt-page-surround">
		<div class="rt-container">
			<?php /** Begin Header Surround **/ if ($gantry->countModules('header') or $gantry->countModules('drawer') or $gantry->countModules('top') or $gantry->countModules('utility') or $gantry->countModules('showcase') or $gantry->countModules('feature') or $gantry->countModules('breadcrumb')) : ?>
			<header id="rt-header-surround" class="<?php if ($gantry->get('headersurround-parallax')) : ?>rt-parallax<?php endif; ?>"<?php if ($gantry->get('headersurround-parallax')):?> data-parallax-delta="<?php echo $gantry->get('headersurround-speed', -0.3);?>"<?php endif; ?>>
				<?php /** Begin Header **/ if ($gantry->countModules('header')) : ?>
				<div id="rt-header">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('header','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Header **/ endif; ?>
				<?php /** Begin Drawer **/ if ($gantry->countModules('drawer')) : ?>
				<div id="rt-drawer">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('drawer','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Drawer **/ endif; ?>
				<?php /** Begin Top **/ if ($gantry->countModules('top')) : ?>
				<div id="rt-top">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('top','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Top **/ endif; ?>
				<?php /** Begin Utility **/ if ($gantry->countModules('utility')) : ?>
				<div id="rt-utility">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('utility','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Utility **/ endif; ?>
				<?php /** Begin Showcase **/ if ($gantry->countModules('showcase')) : ?>
				<div id="rt-showcase">
					<div class="rt-showcase-overlay">
						<div class="rt-inner-container">
							<?php echo $gantry->displayModules('showcase','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
				</div>
				<?php /** End Showcase **/ endif; ?>
				<?php /** Begin Feature **/ if ($gantry->countModules('feature')) : ?>
				<div id="rt-feature">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('feature','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Feature **/ endif; ?>
				<?php /** Begin Breadcrumbs **/ if ($gantry->countModules('breadcrumb')) : ?>
				<div id="rt-breadcrumbs">
					<div class="rt-inner-container">
						<?php echo $gantry->displayModules('breadcrumb','standard','standard'); ?>
						<div class="clear"></div>
					</div>
				</div>
				<?php /** End Breadcrumbs **/ endif; ?>
			</header>
			<?php /** End Header Surround **/ endif; ?>

			<?php /** RTL SidePanel Mode **/ ?>
			<section id="rt-sidepanel-surround">
				<div id="rt-body-content">
					<?php /** Begin Main Section **/ ?>
					<section id="rt-main-surround">
						<div id="rt-mainbody-surround">
							<?php /** Begin Main Top **/ if ($gantry->countModules('maintop')) : ?>
							<div id="rt-maintop">
								<div class="rt-maintop-overlay">
									<div class="rt-inner-container">
										<?php echo $gantry->displayModules('maintop','standard','standard'); ?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<?php /** End Main Top **/ endif; ?>
							<?php /** Begin Expanded Top **/ if ($gantry->countModules('expandedtop')) : ?>
							<div id="rt-expandedtop">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('expandedtop','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
							<?php /** End Expanded Top **/ endif; ?>
							<?php /** Begin Main Body **/ ?>
							<?php ob_start(); ?>
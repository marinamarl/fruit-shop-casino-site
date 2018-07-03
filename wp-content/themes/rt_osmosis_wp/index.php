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

			<?php /** SidePanel Mode **/ if (!is_rtl() && ($gantry->get('sidepanel-enabled'))) : ?>
			<section id="rt-sidepanel-surround">
				<div id="rt-sidepanel-content">
					<div class="rt-sidepanel-wrapper">
						<?php echo $gantry->displayModules('sidepanel','standard','standard',3); ?>
					</div>
				</div>
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
							<?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
							<?php /** End Main Body **/ ?>
							<?php /** Begin Expanded Bottom **/ if ($gantry->countModules('expandedbottom')) : ?>
							<div id="rt-expandedbottom">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('expandedbottom','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
							<?php /** End Expanded Bottom **/ endif; ?>
							<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
							<div id="rt-mainbottom">
								<div class="rt-mainbottom-overlay">
									<div class="rt-inner-container">
										<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<?php /** End Main Bottom **/ endif; ?>
							<?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
							<div id="rt-extension">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('extension','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
							<?php /** End Extension **/ endif; ?>
						</div>
					</section>
					<?php /** End Main Section **/ ?>

					<?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
					<footer id="rt-footer-surround">
						<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
						<div id="rt-bottom">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Bottom **/ endif; ?>
						<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
						<div id="rt-footer">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('footer','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Footer **/ endif; ?>
						<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
						<div id="rt-copyright">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Copyright **/ endif; ?>
					</footer>
					<?php /** End Footer Surround **/ endif; ?>

					<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
					<div id="rt-debug">
						<?php echo $gantry->displayModules('debug','basic','basic'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Debug **/ endif; ?>

					<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
					<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
					<?php /** End Analytics **/ endif; ?>

					<?php /** Popup Login and Popup Module **/ ?>
					<?php echo $gantry->displayModules('login','login','popup'); ?>
					<?php echo $gantry->displayModules('popup','popup','popup'); ?>
					<?php /** End Popup Login and Popup Module **/ ?>
				</div>
				<div class="clear"></div>
			</section>
			<?php /** End SidePanel Mode **/ endif; ?>

			<?php /** RTL SidePanel Mode **/ if (is_rtl() && $gantry->get('rtl-enabled') && ($gantry->get('sidepanel-enabled'))) : ?>
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
							<?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
							<?php /** End Main Body **/ ?>
							<?php /** Begin Expanded Bottom **/ if ($gantry->countModules('expandedbottom')) : ?>
							<div id="rt-expandedbottom">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('expandedbottom','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
							<?php /** End Expanded Bottom **/ endif; ?>
							<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
							<div id="rt-mainbottom">
								<div class="rt-mainbottom-overlay">
									<div class="rt-inner-container">
										<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
										<div class="clear"></div>
									</div>
								</div>
							</div>
							<?php /** End Main Bottom **/ endif; ?>
							<?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
							<div id="rt-extension">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('extension','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
							<?php /** End Extension **/ endif; ?>
						</div>
					</section>
					<?php /** End Main Section **/ ?>

					<?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
					<footer id="rt-footer-surround">
						<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
						<div id="rt-bottom">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Bottom **/ endif; ?>
						<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
						<div id="rt-footer">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('footer','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Footer **/ endif; ?>
						<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
						<div id="rt-copyright">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Copyright **/ endif; ?>
					</footer>
					<?php /** End Footer Surround **/ endif; ?>

					<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
					<div id="rt-debug">
						<?php echo $gantry->displayModules('debug','basic','basic'); ?>
						<div class="clear"></div>
					</div>
					<?php /** End Debug **/ endif; ?>

					<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
					<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
					<?php /** End Analytics **/ endif; ?>

					<?php /** Popup Login and Popup Module **/ ?>
					<?php echo $gantry->displayModules('login','login','popup'); ?>
					<?php echo $gantry->displayModules('popup','popup','popup'); ?>
					<?php /** End Popup Login and Popup Module **/ ?>
				</div>
				<div id="rt-sidepanel-content">
					<div class="rt-sidepanel-wrapper">
						<?php echo $gantry->displayModules('sidepanel','standard','standard',3); ?>
					</div>
				</div>
				<div class="clear"></div>
			</section>
			<?php /** End RTL SidePanel Mode **/ endif; ?>

			<?php /** Standard Mode **/ if (!($gantry->get('sidepanel-enabled'))) : ?>
			<section id="rt-standard-mode">
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
						<?php echo $gantry->displayMainbody('mainbody','sidebar','standard','standard','standard','standard','standard'); ?>
						<?php /** End Main Body **/ ?>
						<?php /** Begin Expanded Bottom **/ if ($gantry->countModules('expandedbottom')) : ?>
						<div id="rt-expandedbottom">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('expandedbottom','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Expanded Bottom **/ endif; ?>
						<?php /** Begin Main Bottom **/ if ($gantry->countModules('mainbottom')) : ?>
						<div id="rt-mainbottom">
							<div class="rt-mainbottom-overlay">
								<div class="rt-inner-container">
									<?php echo $gantry->displayModules('mainbottom','standard','standard'); ?>
									<div class="clear"></div>
								</div>
							</div>
						</div>
						<?php /** End Main Bottom **/ endif; ?>
						<?php /** Begin Extension **/ if ($gantry->countModules('extension')) : ?>
						<div id="rt-extension">
							<div class="rt-inner-container">
								<?php echo $gantry->displayModules('extension','standard','standard'); ?>
								<div class="clear"></div>
							</div>
						</div>
						<?php /** End Extension **/ endif; ?>
					</div>
				</section>
				<?php /** End Main Section **/ ?>

				<?php /** Begin Footer Section **/ if ($gantry->countModules('bottom') or $gantry->countModules('footer') or $gantry->countModules('copyright')) : ?>
				<footer id="rt-footer-surround">
					<?php /** Begin Bottom **/ if ($gantry->countModules('bottom')) : ?>
					<div id="rt-bottom">
						<div class="rt-inner-container">
							<?php echo $gantry->displayModules('bottom','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Bottom **/ endif; ?>
					<?php /** Begin Footer **/ if ($gantry->countModules('footer')) : ?>
					<div id="rt-footer">
						<div class="rt-inner-container">
							<?php echo $gantry->displayModules('footer','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Footer **/ endif; ?>
					<?php /** Begin Copyright **/ if ($gantry->countModules('copyright')) : ?>
					<div id="rt-copyright">
						<div class="rt-inner-container">
							<?php echo $gantry->displayModules('copyright','standard','standard'); ?>
							<div class="clear"></div>
						</div>
					</div>
					<?php /** End Copyright **/ endif; ?>
				</footer>
				<?php /** End Footer Surround **/ endif; ?>

				<?php /** Begin Debug **/ if ($gantry->countModules('debug')) : ?>
				<div id="rt-debug">
					<?php echo $gantry->displayModules('debug','basic','basic'); ?>
					<div class="clear"></div>
				</div>
				<?php /** End Debug **/ endif; ?>

				<?php /** Begin Analytics **/ if ($gantry->countModules('analytics')) : ?>
				<?php echo $gantry->displayModules('analytics','basic','basic'); ?>
				<?php /** End Analytics **/ endif; ?>

				<?php /** Popup Login and Popup Module **/ ?>
				<?php echo $gantry->displayModules('login','login','popup'); ?>
				<?php echo $gantry->displayModules('popup','popup','popup'); ?>
				<?php /** End Popup Login and Popup Module **/ ?>
			<?php /** End Standard Mode **/ endif; ?>
			</section>
		</div>
	</div>
	<?php $gantry->displayFooter(); ?>
</body>
</html>
<?php
$gantry->finalize();
?>
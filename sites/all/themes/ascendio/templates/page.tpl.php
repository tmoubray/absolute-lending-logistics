<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *	 least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *	 or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *	 when linking to the front page. This includes the language domain or
 *	 prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *	 in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *	 in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *	 site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *	 the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *	 modules, intended to be displayed in front of the main title tag that
 *	 appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *	 modules, intended to be displayed after the main title tag that appears in
 *	 the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *	 prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *	 (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *	 menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *	 associated with the page, and the node ID is the second argument
 *	 in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *	 comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content_top']: Items for the header region.
 * - $page['content']: The main content of the current page.
 * - $page['content_bottom']: Items for the header region.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>


<?php if ( !theme_get_setting( 'ascendio_breadcrumb_show' ) ) :
	$breadcrumb = NULL;
endif; ?>

<?php if ( $main_menu ) : ?>
	<a href="#main-menu" class="element-invisible element-focusable"><?php print t( 'Skip to navigation' ); ?></a>
<?php endif; ?>
<a href="#content" class="element-invisible element-focusable"><?php print t( 'Skip to main content' ); ?></a>


<div id="page-wrapper" class="page-wrapper">
	<div id="page" class="page">
		
		<!-- Header
		======================================================================================= -->
		<header id="header" class="header page-header clearfix" role="banner">
			<!-- Region Header Top -->
			<?php if ( $page['header_top'] ) : 
				ascendio_region_preffix ( 'header_top' );
					print render( $page['header_top'] );
				ascendio_region_suffix ( 'header_top' );
			endif; ?>


			<div class="<?php if ( theme_get_setting( 'ascendio_sticky_menu' ) ) { echo 'stickup '; } ?>header-section"> <!-- Sticky menu wrapper -->
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="header-section_inner">
								<!-- Logo -->
								<?php if ( $logo || $site_name || $site_slogan ) :?>
									<div id="logo" class="logo">
										<?php if ( $logo ) : // logo image ?>
											<a href="<?php print $front_page; ?>" title="<?php print t( 'Home' ); ?>" rel="home" id="img-logo" class="img-logo">
												<img src="<?php print $logo; ?>" alt="<?php print t( 'Home' ); ?>">
											</a>
										<?php endif;
							
										if ( $site_name ) : //site name ?>
											<h1 title="<?php print $site_name; ?>" id="site-name" class="site-name">
												<a href="<?php print $front_page; ?>" title="<?php print $site_name; ?>"><?php print $site_name; ?></a>
											</h1>
										<?php endif;
							
										if ( $site_slogan ) : // site slogan ?>
											<div title="<?php print $site_slogan; ?>" id="slogan" class="slogan">
												<?php print $site_slogan; ?>
											</div>
										<?php endif; ?>
									</div><!-- /#name-and-slogan -->
								<?php endif; ?>
							
								<!-- Region Menu -->
								<?php if ( $page['menu'] ) :
									print render( $page['menu'] );
								endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php if ( $breadcrumb ) : ?>
				<!-- Breadcrumbs -->
				<div class="breadcrumbs_wrapper">
					<div class="container">
						<div class="row">
							<div class="col-sm-12">
								<div id="breadcrumb" class="breadcrumb"><?php print $breadcrumb; ?></div>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>

			<!-- Region Header -->
			<?php if ( $page['header'] ) : 
				ascendio_region_preffix ( 'header' );
					print render( $page['header'] );
				ascendio_region_suffix ( 'header' );
			endif; ?>

			<!-- Region Header Two -->
			<?php if ( $page['header_two'] ) : 
				ascendio_region_preffix ( 'header_two' );
					print render( $page['header_two'] );
				ascendio_region_suffix ( 'header_two' );
			endif; ?>

			<!-- Region Header bottom -->
			<?php if ( $page['header_bottom'] ) : 
				ascendio_region_preffix ( 'header_bottom' );
					print render( $page['header_bottom'] );
				ascendio_region_suffix ( 'header_bottom' );
			endif; ?>
		</header>

		<!-- Content
		======================================================================================= -->
		<div id="main-wrapper" class="main-wrapper" role="main">
			
			<!-- Region content top -->
			<?php if ( $page['content_top'] ) : 
				ascendio_region_preffix ( 'content_top' );
					print render( $page['content_top'] );
				ascendio_region_suffix ( 'content_top' );
			endif; ?>

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<div id="main" class="main clearfix">
							<?php if ( $page['sidebar_first'] ) : ?>
								<!-- Left sidebar -->
								<aside id="sidebar-first" class="sidebar-first sidebar col-sm-12 col-md-4" role="complementary">
									<?php print render( $page['sidebar_first'] ); ?>
								</aside>
							<?php endif; ?>
					
							<!-- Page content -->
							<div id="content" class="content content-main <?php if ( ( $page['sidebar_first'] ) && ( $page['sidebar_second'] ) ) : print 'col-sm-12 col-md-4'; elseif ( $page['sidebar_first'] ) : print 'col-sm-12 col-md-8'; elseif ( $page['sidebar_second'] ) : print 'col-sm-12 col-md-8'; endif; ?>">
								<?php if ( $page['highlighted'] || $breadcrumb || ( $title && !$is_front ) || $tabs['#primary'] || $action_links || $page['help'] || $messages ) : ?>
									<header id="content-header" class="content-header">
										<?php if ( $messages ) : ?>
											<!-- System messages -->
											<div id="messages" class="messages-wrapper clearfix">
												<?php print $messages; ?>
											</div>
										<?php endif; ?>
					
										<?php if ( $page['highlighted'] ) : ?>
											<!-- Highlighted -->
											<div id="highlighted" class="highlighted"><?php print render( $page['highlighted'] ); ?></div>
										<?php endif; ?>
					
					
										<?php if ( $title && !$is_front ) :
											print render( $title_prefix ); ?>
												<!-- Page title -->
												<h2 id="page-title" class="title page-title" ><?php print $title; ?></h2>
											<?php print render( $title_suffix );
										endif; ?>
					
										<?php if ( $page['help'] ): ?>
											<!-- System help block -->
											<?php print render( $page['help'] );
										endif; ?>
					
										<?php if ( !empty( $tabs['#primary'] ) ) : ?>
											<!-- Tabs links -->
											<div class="tabs"><?php print render( $tabs ); ?></div>
										<?php endif; ?>
					
										<?php if ( $action_links ) : ?>
											<!-- Action links -->
											<ul class="action-links">
												<?php print render( $action_links ); ?>
											</ul>
										<?php endif; ?>
									</header>
								<?php endif; ?>
					
								<!-- Page content -->
								<?php if ( $page['content'] ) :
									print render( $page['content'] );
								endif; ?>
							</div>
					
							<?php if ( $page['sidebar_second'] ) : ?>
								<!-- Right sidebar -->
								<aside id="sidebar-second" class="sidebar-second sidebar col-sm-12 col-md-4" role="complementary">
									<div class="section">
										<?php print render( $page['sidebar_second'] ); ?>
									</div>
								</aside>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			
			<!-- Region content bottom -->
			<?php if ( $page['content_bottom'] ) : 
				ascendio_region_preffix ( 'content_bottom' );
					print render( $page['content_bottom'] );
				ascendio_region_suffix ( 'content_bottom' );
			endif; ?>

			<!-- Region Section one -->
			<?php if ( $page['section_one'] ) : 
				ascendio_region_preffix ( 'section_one' );
					print render( $page['section_one'] );
				ascendio_region_suffix ( 'section_one' );
			endif; ?>

			<!-- Region Section two -->
			<?php if ( $page['section_two'] ) : 
				ascendio_region_preffix ( 'section_two' );
					print render( $page['section_two'] );
				ascendio_region_suffix ( 'section_two' );
			endif; ?>
			
		</div>

		<!-- Footer
		======================================================================================= -->
		<footer id="footer" class="footer page-footer" role="contentinfo">

			<!-- Region Footer top -->
			<?php if ( $page['footer_top'] ) : 
				ascendio_region_preffix ( 'footer_top' );
					print render( $page['footer_top'] );
				ascendio_region_suffix ( 'footer_top' );
			endif; ?>

			<div class="footer-wrapper invert">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 clearfix">
							<!-- Region Footer -->
							<?php if ( $page['footer'] ) :
								print render( $page['footer'] );
							endif; ?>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>
</div>
<!doctype html>
<html lang="en" dir="ltr">
	<head>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<a class="sr-only sr-only-focusable" href="#main">Skip to main content</a>

		<div class="full-height off-canvas" id="slide-div">
			<div class="container">
				<div class="row">
					<div class="col-lg-1"></div>
					<div class="col-lg-10">
						<nav role="navigation">
							<?php wp_nav_menu( array( 'container_class' => 'menu-main-menu-container', 'menu_class' => 'main-header-menu hide-1000', 'menu_id' => '','theme_location' => 'mobile' ) ); ?>
						</nav>
						<div class="contact-block content-block">
							<div class="contact-details">
								<h3>Other ways to reach us</h3>
								<p>Email: <a href="mailto:<?php echo get_field('contact_email', 'option');?>" title="Email us"><?php echo get_field('contact_email', 'option');?></a></p>
								<p>Tel: <a href="tel:<?php echo get_field('contact_telephone', 'option');?>" title="Phone us"><?php echo get_field('contact_telephone', 'option');?></a></p>
							</div>
						</div>
						<div class="footer-socials contact-socials">
							<h3>Follow us:</h3>
							<ul class="social-links">
								<?php if(get_field('facebook_url', 'option')) { ?>
									<li class="social-facebook"><a href="<?php the_field('facebook_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on Facebook"><i class="fa-brands fa-facebook-f"></i></a></li>
								<?php } ?>
								<?php if(get_field('instagram_url', 'option')) { ?>
									<li class="social-insta"><a href="<?php the_field('instagram_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on Instagram"><i class="fa-brands fa-instagram"></i></a></li>
								<?php } ?>
								<?php if(get_field('linkedin_url', 'option')) { ?>
									<li class="social-linkedin"><a href="<?php the_field('linkedin_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on LinkedIn"><i class="fa-brands fa-linkedin"></i></a></li>
								<?php } ?>
								<?php if(get_field('youtube_url', 'option')) { ?>
									<li class="social-youtube"><a href="<?php the_field('youtube_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on YouTube"><i class="fa-brands fa-youtube"></i></a></li>
								<?php } ?>
								<?php if(get_field('pinterest_url', 'option')) { ?>
									<li class="social-pinterest"><a href="<?php the_field('pinterest_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on Pinterest"><i class="fa-brands fa-pinterest-p" ></i></a></li>
								<?php } ?>
								<?php if(get_field('twitter_url', 'option')) { ?>
									<li class="social-twitter"><a href="<?php the_field('twitter_url', 'option'); ?>" target="_blank" rel="noopener noreferrer" title="Follow us on Twitter"><i class="fa-brands fa-x-twitter"></i></a></li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mobile-overflow">
			<header>
				<div class="navigation-bg">
					<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/img/header-banner.png" alt=" " class="img-res"/>
				</div>
				<div class="container container-header">
					<div class="row">
						<div class="col-lg-5">
							
						</div>
						<div class="col-lg-2 text-center">
							<a href="<?php bloginfo('url'); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" class="header-logo">
								<?php 
									$image = get_field('site_main_logo', 'option');
									if ( $image ) {
											echo wp_get_attachment_image( $image, 'full' );
									}
								?>
							</a>
						</div>
						<div class="col-lg-5 text-end">


							<div class="hamburger" id="trigger">
								<div class="hamburger-lines">
									<div class="top-bun"></div>
									<div class="meat"></div>
									<div class="bottom-bun"></div>
								</div>
							</div>
						</div>
				</div>
			</header>
			<section class="position-sticky sticky-header main-nav-sticky">
				<div class="container container-header">
					<nav role="navigation" aria-label="Primary navigation">
						<?php wp_nav_menu( array( 'container_class' => 'menu-main-menu-container', 'menu_class' => 'main-header-menu-sticky', 'menu_id' => '','theme_location' => 'primary' ) ); ?>
					</nav>
				</div>
			</section>
			<div class="hidden-height"></div>

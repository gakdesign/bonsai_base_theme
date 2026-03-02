<footer role="contentinfo" aria-label="Site Footer">
	<div class="container">
		<div class="row">
			<div class="col-xl-1 col-lg-12">
				<a href="<?php bloginfo('url'); ?>/" title="<?php echo get_bloginfo( 'name' ); ?>" class="footer-logo">
					<?php 
						$image = get_field('site_footer_logo', 'option');  
						if ( $image ) {
								echo wp_get_attachment_image( $image, 'full' );
						}
					?>
				</a>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-4">

				<?php wp_nav_menu( array( 'container_class' => 'footer-menu-container', 'menu_class' => 'footer-menu', 'menu_id' => '','theme_location' => 'footer' ) ); ?>
			</div>
			<div class="col-xl-2 col-lg-3 col-md-4 bold-footer">
				<?php wp_nav_menu( array( 'container_class' => 'footer-menu-container', 'menu_class' => 'footer-menu', 'menu_id' => '','theme_location' => 'footer_what' ) ); ?>
				<div class="mobile-about">
					<?php wp_nav_menu( array( 'container_class' => 'footer-menu-container', 'menu_class' => 'footer-menu', 'menu_id' => '','theme_location' => 'footer_about' ) ); ?>
					<?php
						// Social links with accessible aria-labels

						$social_networks = [
							'facebook'  => 'fa-facebook-f',
							'instagram' => 'fa-instagram',
							'linkedin'  => 'fa-linkedin',
							'youtube'   => 'fa-youtube',
							'twitter'   => 'fa-x-twitter',
						];

						// Human-readable labels for aria-labels
						$social_labels = [
							'facebook'  => __( 'Facebook', 'your-text-domain' ),
							'instagram' => __( 'Instagram', 'your-text-domain' ),
							'linkedin'  => __( 'LinkedIn', 'your-text-domain' ),
							'youtube'   => __( 'YouTube', 'your-text-domain' ),
							'twitter'   => __( 'Twitter', 'your-text-domain' ),
						];

						echo '<ul class="social-links">';
						foreach ( $social_networks as $key => $icon_class ) {
							$url = get_field( $key . '_url', 'option' );

							if ( $url ) {
								$label = isset( $social_labels[ $key ] ) ? $social_labels[ $key ] : ucfirst( $key );

								$aria_label = sprintf(
									/* translators: %s: Social network name. */
									__( 'Visit our %s profile (opens in a new tab)', 'your-text-domain' ),
									$label
								);

								printf(
									'<li class="social-%1$s"><a href="%2$s" target="_blank" rel="noopener noreferrer" aria-label="%4$s"><i class="fa-brands %3$s"></i></a></li>',
									esc_attr( $key ),
									esc_url( $url ),
									esc_attr( $icon_class ),
									esc_attr( $aria_label )
								);
							}
						}
						echo '</ul>';
					?>
				</div>

			</div>

		</div>
	</div>
</footer>
<section class="sub-footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-4 center-mobile">
				<?php wp_nav_menu( array( 'container_class' => '', 'menu_class' => 'footer-menu-legal', 'menu_id' => '','theme_location' => 'legal' ) ); ?>
			</div>
			<div class="col-lg-4 text-center">
				<p>
					© <?php echo date("Y"); ?> <?php the_field('copyright_text', 'option'); ?>
				</p>
			</div>
			<div class="col-lg-4 text-end center-mobile">
				<p>Website by <a href="https://bonsaidigitalcollective.co.uk" target="_blank" title="Website by The Bonsai Digital Collective">The Bonsai Digital Collective</a></p>
			</div>
		</div>
	</div>
</section>
</div>
<?php wp_footer();?>
</body>
</html>
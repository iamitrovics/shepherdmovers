<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

	<footer id="page-footer">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3><?php the_field('company_title_footer', 'options'); ?></h3>
					<span class="footer-phone"><a href="tel:<?php the_field('phone_number_footer', 'options'); ?>"><?php the_field('phone_number_footer', 'options'); ?></a></span>
					<!-- /.footer-phone -->
					<div class="footer-socials">
						<ul>
							<?php if( have_rows('social_networks_general', 'options') ): ?>
								<?php while( have_rows('social_networks_general', 'options') ): the_row(); ?>
									<li><a href="<?php the_sub_field('link_to_network'); ?>" target="_blank"><?php the_sub_field('icon_code'); ?></a></li>
								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					<!-- /.footer-socials -->

					<div class="trustpilot-widget">
						<?php the_field('trustpilot_widget_footer', 'options'); ?>
					</div>
					<!-- /.trustpilot-widget -->

					<div class="footer-certificates">
						<ul>
							<?php if( have_rows('certifications_list_footer', 'options') ): ?>
								<?php while( have_rows('certifications_list_footer', 'options') ): the_row(); ?>

									<li>
										<?php the_sub_field('certification_code'); ?>
									</li>

								<?php endwhile; ?>
							<?php endif; ?>
						</ul>
					</div>
					<!-- /.footer-certificates -->

				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
		<div class="container container-new">
			<div class="row">
				<div class="col-md-12">
					<div class="cities-list">
						<?php wp_nav_menu( array( 'theme_location' => 'footer' ) ); ?>
					</div>
					<!-- /.cities-list -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-new -->
		<div class="copy-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<small><?php the_field('copyright_notice_footer', 'options'); ?></small>
					</div>
					<!-- /.col-md-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /.copy-bar -->
	</footer>
	<!-- /#page-footer -->
	</div>
	<!-- /.page-wrapper -->

	<?php if ( get_field( 'display_settings_cookies' , 'options') ): ?>
	<div id="cookie-notice">
		<div id="cookie-notice-in">
			<div class="notice-text">
				<?php the_field('notice_text_cookies', 'options'); ?>
			</div>
			<!-- /.notice-text -->
			<div class="notice-btns">
				<a href="#" id="accept-cookie"><?php the_field('button_1_label_cookies', 'options'); ?></a>
				<a href="<?php the_field('button_link_cooke_2', 'options'); ?>" target="_blank" id="more-info-cookie"><?php the_field('button_2_label_cooki', 'options'); ?></a>
			</div>
			<!-- /.notice-btns -->
			<a href="javascript:void(0);" id="close-notice"></a>
		</div>
		<!-- /#cookie-notice-in -->
	</div>
	<!-- /#cookie-notice -->
	<?php else: ?>
	<?php endif; ?>	

	<div class="modal-overlay disclaimer-modal" data-my-element="tooltip-modal">
		<div class="modal" data-my-element="tooltip-modal">
			<a class="close-modal">
				<img src="<?php bloginfo('template_directory'); ?>/img/ico/close.svg" alt="">
			</a>
			<!-- close modal -->
			<div class="disclaimer-modal-wrap">
					<?php the_field('tooltip_content_modal', 'options'); ?>
			</div>
			<!-- /.disclaimer-modal-wrap -->
		</div>
		<!-- modal -->
	</div>	

	<?php 
	$values = get_field( 'phone_number_top_cta' );
	if ( $values ) { ?>

		<div id="fixed-cta">
			<a href="tel:<?php the_field('phone_number_top_cta') ?>"><small><img src="<?php bloginfo('template_directory'); ?>/img/ico/phone-solid.svg" alt=""></small><span>Call: </span> <strong><?php the_field('phone_number_top_cta') ?></strong></a>
		</div>
		<!-- // fixed cta  -->

	<?php 
	} else { ?>
		
		<div id="fixed-cta">
			<a href="tel:<?php the_field('main_phone_number_top_gen', 'options') ?>"><small><img src="<?php bloginfo('template_directory'); ?>/img/ico/phone-solid.svg" alt=""></small><span>Call: </span> <strong><?php the_field('main_phone_number_top_gen', 'options') ?></strong></a>
		</div>
		<!-- // fixed cta  -->		

	<?php } ?>	

	<?php wp_footer(); ?>

	<?php if( get_field('footer_code_snippet', 'options') ): ?>
		<?php the_field('footer_code_snippet', 'options'); ?>
	<?php endif; ?>

</body>
</html>


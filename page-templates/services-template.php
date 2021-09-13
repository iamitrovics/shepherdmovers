<?php
/**
 * Template Name: Services Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_serv_header');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_serv_header'); ?></h1>
					</div>
					<!-- /.header-caption -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</header>

	<section id="about-page" class="section-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">

					<div class="fit-wrap">
						<div class="intro">
							<h2><?php the_field('main_title_serv_page'); ?></h2>
						</div>
						<!-- /.intro -->
						<?php the_field('intro_text_serv_page'); ?>
					</div>
					<!-- /.fit-wrap -->

					<div class="about-body">
						<div class="row service-row">				
							<?php if( have_rows('services_serv_page') ): ?>
								<?php while( have_rows('services_serv_page') ): the_row(); ?>

									<div class="col-md-4">
										<div class="about-photo">
											<a href="<?php the_sub_field('service_link'); ?>">
												<span><i class="fal fa-long-arrow-right"></i></span>
												<?php
												$imageID = get_sub_field('featured_image');
												$image = wp_get_attachment_image_src( $imageID, 'service-image' );
												$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
												?> 

												<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
											</a>
										</div>
										<!-- /.about-photo -->
									

										<div class="about-content">
											<a href="<?php the_sub_field('service_link'); ?>"><h3><?php the_sub_field('service_name'); ?></h3></a>
										</div>
										<!-- /.about-content -->			
									</div>
									<!-- /.col-md-4 -->

								<?php endwhile; ?>
							<?php endif; ?>
						</div>
						<!-- /.row service-row -->
					</div>
					<!-- /.about-body -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

		<div id="service-bottom-cta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="phone">
							<a href="tel:<?php the_field('phone_number_bottom_cta_ser'); ?>"><i class="twf twf-phone"></i> <?php the_field('phone_number_bottom_cta_ser'); ?></a>
						</div>
						<!-- /.phone -->
						<div class="quote-btn">
						<a href="<?php the_field('button_link_serv_page_iner'); ?>"><?php the_field('button_label_serv_page'); ?> <i class="twf twf-ln-arrow-right"></i></a>
						</div>
						<!-- /.quote-btn -->
					</div>
					<!-- /.col-md-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /#service-bottom-cta -->

	</section>
	<!-- /#about-area -->
		
<?php get_footer(); ?>


<?php
/**
 * Template Name: About Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_header_about');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_about_header'); ?></h1>
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
							<h2><?php the_field('main_title_about_page'); ?></h2>
						</div>
						<!-- /.intro -->
						<?php the_field('intro_text_about_page'); ?>
					</div>
					<!-- /.fit-wrap -->
					<div class="about-body">
						<h3><?php the_field('block_title_about_main'); ?></h3>
						<div class="row">
							<div class="col-md-8">
								<div class="about-content">
									<?php the_field('content_block_about_page_main'); ?>
								</div>
								<!-- /.about-content -->
							</div>
							<!-- /.col-md-8 -->
							<div class="col-md-4">
								<div class="about-photo">
									<?php
									$imageID = get_field('featured_photo_about_page');
									$image = wp_get_attachment_image_src( $imageID, 'service-image' );
									$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
									?> 

									<img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 								
									<span class="photo-caption"><?php the_field('caption_about_page'); ?></span>
									<!-- /.photo-caption -->
								</div>
								<!-- /.about-photo -->
							</div>
							<!-- /.col-md-4 -->
						</div>
						<!-- /.row -->
					</div>
					<!-- /.about-body -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->

		<div id="bottom-cta">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<span class="bottom-cta-title"><?php the_field('cta_title_bottom_about'); ?></span>
						<!-- /.bottom-cta-title -->
						<a href="tel:<?php the_field('phone_number_bototm_cta'); ?>"><i class="twf twf-phone"></i> <?php the_field('phone_number_bototm_cta'); ?></a>
					</div>
					<!-- /.col-md-12 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /.container -->
		</div>
		<!-- /#bottom-cta -->

	</section>
	<!-- /#about-area -->
	
<?php get_footer(); ?>


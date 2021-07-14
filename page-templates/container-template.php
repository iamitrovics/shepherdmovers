<?php
/**
 * Template Name: Container Sizes Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_container_page');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_cont_header'); ?></h1>
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
					<div id="container-sizes">

						<?php if( have_rows('content_blocks_containers') ): ?>
							<?php while( have_rows('content_blocks_containers') ): the_row(); ?>					

						<div class="container-photo">
							<img src="<?php the_sub_field('featured_image'); ?>" alt="">
						</div>
						<!-- /.container-photo -->

								<div class="container-table">
									<h2><?php the_sub_field('table_title_text'); ?></h2>
									<?php the_sub_field('content_block'); ?>
								</div>
						
							<?php endwhile; ?>
						<?php endif; ?>

					</div>
					<!-- /#container-sizes -->
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
						<span class="bottom-cta-title"><?php the_field('main_title_cta_container'); ?></span>
						<!-- /.bottom-cta-title -->
						<a href="tel:<?php the_field('phone_number_container_size'); ?>"><i class="twf twf-phone"></i> <?php the_field('phone_number_container_size'); ?></a>
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


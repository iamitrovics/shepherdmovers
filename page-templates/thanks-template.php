<?php
/**
 * Template Name: Thank You Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_thanks');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_tnx'); ?></h1>
					</div>
					<!-- /.header-caption -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</header>

	<div id="regular-page">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="fit-wrap">
						<?php the_field('content_block_tnx'); ?>
						<a href="<?php the_field('button_link_tnx'); ?>" class="back"><?php the_field('button_label_tnx'); ?></a>
						<!-- /.back -->
					</div>
					<!-- /.fit-wrap -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /#regular-page -->

<?php get_footer(); ?>


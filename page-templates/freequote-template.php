<?php
/**
 * Template Name: Free Quote Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_free_quote');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_free_quote'); ?></h1>
					</div>
					<!-- /.header-caption -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</header>
	<div id="free-estimate">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="fit-wrap quote-intro">
						<h4><?php the_field('form_title_quock_quote'); ?></h4>
						<div class="quote-form">
							<div class="quote-form-in">
								<?php the_field('form_code_quote_page'); ?>
							</div>
						</div>
					</div>
					<!-- /.fit-wrap -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
			<div class="row">
				<div class="col-md-12">
					<div class="free-estimate-body">
						<?php the_field('content_block_bottom_quote'); ?>
					</div>
					<!-- /.free-estimate-body -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /#free-estimate -->

<?php get_footer(); ?>


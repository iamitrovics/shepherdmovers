<?php
/**
 * Template Name: Contact Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header();
?>

	<?php
	$imageID = get_field('background_image_contact_header');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

	<header id="inner-header" style="background-image: url(<?php echo $image[0]; ?>);">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="header-caption">
						<h1><?php the_field('custom_title_header_contact'); ?></h1>
					</div>
					<!-- /.header-caption -->
				</div>
				<!-- /.col-md-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</header>
	
	<div id="free-estimate" class="contact-page">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-lg-5">
					<div class="contact-content">
						<h2><?php the_field('contact_title_side'); ?></h2>
						<div class="phone">
							<a href="tel:<?php the_field('phone_number_side'); ?>"><i class="twf twf-phone"></i> <?php the_field('phone_number_side'); ?></a>
						</div>
						<!-- /.phone -->
						<div class="email">
							<a href="mailto:<?php the_field('email_address_contact_page'); ?>"><i class="twf twf-ln-mail"></i> <?php the_field('email_address_contact_page'); ?></a>
						</div>
						<!-- /.email -->
					</div>
					<!-- /.contact-content -->
				</div>
				<!-- /.col-md-6 col-lg-5 -->
				<div class="col-md-6 offset-lg-1">
					<div class="quote-form">
						<div class="quote-form-in">
							<?php the_field('form_code_contact_page'); ?>
						</div>
						<!-- /.quote-form-in -->
					</div>
					<!-- /.quote-form --> 
				</div>
				<!-- /.col-md-6 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container -->
	</div>
	<!-- /#free-estimate -->
	
<?php get_footer(); ?>


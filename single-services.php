<?php
/**
 * The template for displaying all single posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
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
                        <h1><?php the_field('custom_title_serv_single'); ?></h1>
                    </div>
                    <!-- /.header-caption -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>

    <section id="about-page" class="section-area service-detailed">

        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <?php if( have_rows('content_sections_serv_page') ): ?>
                        <?php while( have_rows('content_sections_serv_page') ): the_row(); ?>
                            <?php if( get_row_layout() == 'intro' ): ?>

                                <div class="fit-wrap">
                                    <div class="intro">
                                        <h2><?php the_sub_field('main_title'); ?></h2>
                                        <?php the_field('intro_text_serv_page'); ?>
                                    </div>
                                    <!-- /.intro -->
                                    <!--<p>Finding a good moving company is crucial for a smooth relocation process. That is why we at Cross Country do our best to maintain the highest possible standard of the services we provide. We are a dynamic team of moving professionals with years of experience in the relocation business and with one common goal in mind – to leave each and every customer completely satisfied. We provide a wide array of services tailored to fit the needs of each one of our clients. Regardless of your budget, timetable, or other limitations and requirements, we will create a moving plan that works perfectly for you.</p>-->
                                </div>
                                <!-- /.fit-wrap -->

                            <?php elseif( get_row_layout() == 'left_image_content_right' ): ?>

                                <div class="about-body">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="about-photo">
                                                <?php
                                                $imageID = get_sub_field('featured_image');
                                                $image = wp_get_attachment_image_src( $imageID, 'service-image' );
                                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                ?> 

                                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                            </div>
                                            <!-- /.about-photo -->
                                        </div>
                                        <!-- /.col-md-5 -->
                                        <div class="col-md-7">
                                            <div class="about-content">
                                                <!--<h3>Residential Relocation Services</h3>-->
                                                <?php the_sub_field('content_block'); ?>
                                            </div>
                                            <!-- /.about-content -->
                                        </div>
                                        <!-- /.col-md-7 -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.about-body -->

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>                

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
                        <span class="bottom-cta-title"><?php the_field('main_title_cta_serv_singl'); ?></span>
                        <!-- /.bottom-cta-title -->
                        <a href="tel:<?php the_field('phone_number_serv_sing'); ?>"><i class="twf twf-phone"></i> <?php the_field('phone_number_serv_sing'); ?></a>
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
   
<?php
get_footer();

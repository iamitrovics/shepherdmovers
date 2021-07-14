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
	$imageID = get_field('background_image_city');
	$image = wp_get_attachment_image_src( $imageID, 'inner-image' );
	$alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
	?> 

    <header id="cityheader" style="background-image: url(<?php echo $image[0]; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="header-content">
                        <h1><?php the_field('main_title_header_city'); ?></h1>
                        <?php the_field('intro_text_header_city'); ?>
                        <?php include(TEMPLATEPATH . '/inc/inc-quote.php'); ?>
                    </div>
                    <!-- /.header-caption -->
                    
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>

    <div id="city-media">
        <div class="container">
            <div class="row">

            <?php if( have_rows('certifications_list_city') ): ?>
                <?php while( have_rows('certifications_list_city') ): the_row(); ?>

                    <?php if (get_sub_field('type_of_cert') == 'Trust') { ?>

                        <div class="col">
                            <a href="<?php the_sub_field('link_to_cert'); ?>">
                                <img src="<?php bloginfo('template_directory'); ?>/img/logos/trustpilot.png" alt="">
                            </a>
                        </div>

                    <?php } elseif (get_sub_field('type_of_cert') == 'Yelp') { ?>

                        <div class="col">
                            <a href="<?php the_sub_field('link_to_cert'); ?>" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/img/logos/yelp.png" alt="">
                            </a>
                        </div>
                        <!-- /.col -->                    

                    <?php } elseif (get_sub_field('type_of_cert') == 'Google') { ?>

                        <div class="col">
                            <a href="<?php the_sub_field('link_to_cert'); ?>" target="_blank">
                                <img src="<?php bloginfo('template_directory'); ?>/img/logos/google-guaranteed.png" alt="">
                            </a>
                        </div>
                        <!-- /.col -->

                    <?php } ?>   

                <?php endwhile; ?>
            <?php endif; ?>


            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#city-media -->

    <?php if( have_rows('main_content_city') ): ?>
        <?php while( have_rows('main_content_city') ): the_row(); ?>
            <?php if( get_row_layout() == 'intro_section' ): ?>

                <section id="city-about" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fit-wrap">
                                    <div class="intro">
                                        <i class="twf twf-ln-map-marker"></i>
                                        <h2><?php the_sub_field('main_title_intro'); ?></h2>
                                    </div>
                                    <!-- /.intro -->
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'city-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                    <?php the_sub_field('content_block'); ?>
                            </div>
                            <!-- /.fit-wrap -->                              
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#city-about -->

            <?php elseif( get_row_layout() == 'services' ): ?>

                <section id="city-services" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fit-wrap">
                                    <div class="intro">
                                        <i class="twf twf-dm-truck"></i>
                                        <h2><?php the_sub_field('main_title_serv'); ?></h2>
                                    </div>
                                    <!-- /.intro -->
                                </div>
                                <!-- /.fit-wrap -->
                                <div class="services-list">
                                    <div class="row">
                                        <?php
                                            $post_objects = get_sub_field('services_list');

                                            if( $post_objects ): ?>
                                                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                    <?php setup_postdata($post); ?>

                                                        <div class="col-md-4">
                                                            <div class="service-item">
                                                                <div class="service-item-ico">
                                                                    <?php the_field('icon_serv'); ?>
                                                                </div>
                                                                <!-- /.service-item-ico -->
                                                                <div class="service-item-in">
                                                                    <h3><?php the_title(); ?></h3>
                                                                    <?php the_field('short_description_serv'); ?>
                                                                    <a href="<?php echo get_permalink(); ?>" class="cs-cta">Move by sea <i class="twf twf-ln-arrow-right"></i></a>
                                                                </div>
                                                                <!-- /.service-item-in -->
                                                            </div>
                                                            <!-- /.service-item -->
                                                        </div>
                                                        <!-- /.col-md-4 -->

                                                <?php endforeach; ?>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                        <?php endif; ?>                                    

                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.services-list -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#city-services -->

            <?php elseif( get_row_layout() == 'why_choose' ): ?>

                <section id="city-why" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="fit-wrap">
                                    <div class="intro">
                                        <i class="twf twf-et-ribbon"></i>
                                        <h2><?php the_field('main_title_why_gen', 'options'); ?></h2>
                                    </div>
                                    <!-- /.intro -->
                                </div>
                                <!-- /.fit-wrap -->
                                <div class="why-list">
                                    <div class="row">
                                        <?php if( have_rows('why_list_gen', 'options') ): ?>
                                            <?php while( have_rows('why_list_gen', 'options') ): the_row(); ?>

                                                <div class="col-md-6">
                                                    <div class="why-box">
                                                        <div class="why-box-text">
                                                            <h3><?php the_sub_field('title'); ?></h3>
                                                            <p><?php the_sub_field('description'); ?></p>
                                                        </div>
                                                        <!-- /.why-box-text -->
                                                        <?php the_sub_field('icon_code'); ?>
                                                    </div>
                                                    <!-- /.why-box -->
                                                </div>
                                                <!-- /.col-md-6 -->

                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.why-list -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#city-why -->     

            <?php elseif( get_row_layout() == 'middle_cta' ): ?>    
            
                <?php
                $imageID = get_sub_field('background_image_city');
                $image = wp_get_attachment_image_src( $imageID, 'full-image' );
                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                ?> 

                <section id="city-more" style="background-image: url(<?php echo $image[0]; ?>);" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div id="city-more-in">
                                    <div class="fit-wrap">
                                        <div class="intro">
                                            <i class="twf twf-ln-car"></i>
                                            <h2><?php the_sub_field('cta_title'); ?></h2>
                                        </div>
                                        <!-- /.intro -->
                                    </div>
                                    <!-- /.fit-wrap -->
                                    <?php the_sub_field('content_block'); ?>
                                    <a href="#city-bottom-quote" class="bookbtn"><?php the_sub_field('button_label'); ?> <i class="twf twf-ln-arrow-down"></i></a>
                                </div>
                                <!-- /#city-more-in -->

                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </section>
                <!-- /#city-more -->     

            <?php elseif( get_row_layout() == 'testimonials' ): ?>    
            
                <section id="city-review" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="review-content">
                                    <h2><?php the_sub_field('main_title_test'); ?></h2>
                                    <div class="stars">★★★★★</div>

                                    <?php
                                        $post_objects = get_sub_field('reviews');

                                        if( $post_objects ): ?>
                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                <?php setup_postdata($post); ?>

                                                    <span class="author"><?php the_title(); ?></span>
                                                    <?php the_field('review_text_test'); ?>

                                            <?php endforeach; ?>
                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                    <?php endif; ?>

                                </div>
                                <!-- /.review-content -->
                            </div>
                            <!-- /.col-lg-8 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                    <div class="review-photo">
                        <img src="<?php bloginfo('template_directory'); ?>/img/bg/review-couple.png" alt="">
                    </div>
                    <!-- /.review-photo -->
                </section>
                <!-- /#city-review -->    

            <?php elseif( get_row_layout() == 'quote' ): ?>     
            
                <div id="city-bottom-quote" class="section-area">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="bottom-quote-content">
                                    <div class="fit-wrap">
                                        <div class="intro">
                                            <i class="twf twf-et-clipboard"></i>
                                            <h2><?php the_sub_field('quote_title'); ?></h2>
                                        </div>
                                        <!-- /.intro -->
                                    </div>
                                    <!-- /.fit-wrap -->
                                    <h3><?php the_sub_field('subtitle'); ?></h3>
                                    <span class="phone">Call <a href="tel:<?php the_sub_field('cta_labe_city_main'); ?>" style=""><?php the_sub_field('cta_labe_city_main'); ?></a></span>
                                    <div class="contact-info">
                                        <p><strong><?php the_sub_field('company_title'); ?></strong></p>
                                        <p><strong>Address:</strong> <?php the_sub_field('address'); ?></p>
                                        <p><strong>Phone:</strong> <a href="tel:<?php the_sub_field('cta_labe_city_main'); ?>"><?php the_sub_field('cta_labe_city_main'); ?></a></p>
                                        <p><strong>Email:</strong> <a href="mailto:<?php the_sub_field('email_address'); ?>"><?php the_sub_field('email_address'); ?></a></p>
                                    </div>
                                    <!-- /.contact-info -->
                                </div>
                                <!-- /.bottom-quote-content -->
                            </div>
                            <!-- /.col-lg-5 -->
                            <div class="col-lg-6">
                                <?php include(TEMPLATEPATH . '/inc/inc-quote.php'); ?>
                            </div>
                            <!-- /.col-md-6 offset-lg-1 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- /#city-bottom-quote -->                           

            <?php endif; ?>
        <?php endwhile; ?>
    <?php endif; ?>    

<?php
get_footer();

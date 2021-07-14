<?php 
/**
 * Homepage / Front Page
**/
get_header(); ?>

    <?php
    $imageID = get_field('background_image_hero_home');
    $image = wp_get_attachment_image_src( $imageID, 'lfull-image' );
    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
    ?> 

    <header id="masheader" style="background-image: url(<?php echo $image[0]; ?>);">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-caption">
                        <h1><?php the_field('main_title_hero_home'); ?></h1>
                        <?php the_field('hero_text_home'); ?>
                    </div>
                    <!-- /.header-caption -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <?php include(TEMPLATEPATH . '/inc/inc-quote.php'); ?>
                </div>
                <!-- /.col-lg-6 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </header>
    <section id="about-area" class="section-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fit-wrap">
                        <div class="intro">
                            <i class="twf twf-et-map-pin"></i>
                            <h2><?php the_field('main_title_about_home'); ?></h2>
                        </div>
                        <!-- /.intro -->
                        <?php the_field('about_content_home'); ?>
                    </div>
                    <!-- /.fit-wrap -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#about-area -->

    <section id="services-area" class="section-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fit-wrap">
                        <div class="intro">
                            <i class="twf twf-et-tools"></i>
                            <h2><?php the_field('main_title_services_home'); ?></h2>
                        </div>
                        <!-- /.intro -->
                        <?php the_field('intro_text_services_home'); ?>
                    </div>
                    <!-- /.fit-wrap -->
                    <div class="services-list">
                        <div class="row">

                            <?php
                                $post_objects = get_field('services_list_home_repe');

                                if( $post_objects ): ?>
                                    <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                        <?php setup_postdata($post); ?>

                                        <div class="col-md-4">
                                            <div class="service-item">
                                                <h3><?php the_field('icon_serv'); ?> <?php the_title(); ?></h3>
                                                <?php the_field('short_description_serv'); ?>
                                                <a class="details-link" href="<?php echo get_permalink(); ?>">Details</a>
                                            </div>
                                            <!-- /.service-item -->
                                        </div>
                                        <!-- /.col-md-4 -->

                                    <?php endforeach; ?>
                                <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                            <?php endif; ?>
                                                    
                            <div class="col-md-4">
                                <div class="service-item">
                                    <?php the_field('cta_text_services_home'); ?>
                                    <div class="quote-link">
                                        <a href="<?php the_field('button_link_cta_serv_home'); ?>"><?php the_field('button_label_serv_cta_home'); ?> <i class="twf twf-ln-arrow-right"></i></a>
                                    </div>
                                    <!-- /.quote-link -->
                                </div>
                                <!-- /.service-item -->
                            </div>
                            <!-- /.col-md-4 -->

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
    <!-- /#services-area -->

    <section id="why-choose" class="section-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="fit-wrap">
                        <div class="intro">
                            <i class="twf twf-ln-globe"></i>
                            <h2><?php the_field('main_title_why_home'); ?></h2>
                        </div>
                        <!-- /.intro -->
                        <div class="why-items">
                            <div class="row">

                                <?php if( have_rows('why_list_home') ): ?>
                                    <?php while( have_rows('why_list_home') ): the_row(); ?>

                                        <div class="col-md-6">
                                            <div class="why-item">
                                                <?php
                                                $imageID = get_sub_field('featured_image');
                                                $image = wp_get_attachment_image_src( $imageID, 'service-image' );
                                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                ?> 

                                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                                <span class="why-title"><?php the_sub_field('label'); ?></span>
                                                <!-- /.why-title -->
                                            </div>
                                            <!-- /.why-item -->
                                        </div>
                                        <!-- /.col-md-6 -->

                                    <?php endwhile; ?>
                                <?php endif; ?>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.why-items -->
                    </div>
                    <!-- /.fit-wrap -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /#why-choose -->

<?php get_footer(); ?>

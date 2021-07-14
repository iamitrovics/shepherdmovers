<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );

?>

<div id="blog-page">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="blog-body">

                    <div class="blog-headline">
                        <?php 
                        $values = get_field( 'custom_title_regular_header' );
                        if ( $values ) { ?>
                            <h1><?php the_field('custom_title_regular_header'); ?></h1>
                        <?php 
                        } else { ?>
                            <h1><?php the_title(); ?></h1>
                        <?php } ?>
                    </div>
                    <!-- /.blog-headline -->

                    
                    <div class="blog-content">

                    <?php if( have_rows('content_layout_regular') ): ?>
                        <?php while( have_rows('content_layout_regular') ): the_row(); ?>
                            <?php if( get_row_layout() == 'full_width_content' ): ?>

                                <?php the_sub_field('content_block'); ?>

                            <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                <div class="featured-photo">
                                    <?php
                                    $imageID = get_sub_field('featured_image');
                                    $image = wp_get_attachment_image_src( $imageID, 'full-image' );
                                    $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                    ?> 

                                    <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                </div>

                            <?php endif; ?>
                        <?php endwhile; ?>
                    <?php endif; ?>                    

                    </div>
                    <!-- /.blog-content -->

                </div>
                <!-- /.blog-body -->
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->
</div>
<!-- /#blog-page -->   

<?php
get_footer();

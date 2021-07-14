<?php
/**
 * The template for displaying the author pages
 *
 * Learn more: https://codex.wordpress.org/Author_Templates
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div id="blog-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1><?php the_author(); ?></h1>
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#blog-header -->
    <div id="blog-listing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="blog-listing-in">
                        <div class="row">

                            <?php
                            
                                while(have_posts()): the_post();
                                    ?>
                                                    
                                    <div class="col-md-6">
                                        <div class="blog-box">
                                            <div class="blog-photo">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <h2><?php the_title(); ?></h2>
                                                    <span><i class="fal fa-long-arrow-right"></i></span>
                                                        <?php
                                                        $imageID = get_field('featured_image_blog');
                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                        ?> 

                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                                                </a>
                                            </div>
                                            <!-- /.blog-photo -->
                                            <div class="blog-content">
                                                <div class="blog-content--in">
                                                    <?php the_field('excerpt_text'); ?>
                                                    <div class="read-more">
                                                        <a href="<?php echo get_permalink(); ?>">Read More</a>
                                                    </div>
                                                    <!-- /.read-more -->
                                                </div>
                                                <!-- /.blog-content--in -->
                                            </div>
                                            <!-- /.blog-content -->
                                        </div>
                                        <!-- /.blog-box -->
                                    </div>
                                    <!-- /.col-md-6 -->                           
                                
                                <?php
                            endwhile;
                            ?>

                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /#blog-listing-in -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="custom-pagination">
                        <?php if( function_exists('wp_pagenavi') ) wp_pagenavi(); // WP-PageNavi function ?>
                    </div>
                    <!-- /.custom-pagination -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#blog-listing -->

<?php
get_footer();

<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

$container = get_theme_mod( 'understrap_container_type' );
?>

    <div id="regular-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="error-page">
                        <h1><?php the_field('main_title_ermac', 'options'); ?></h1>
                        <h2><?php the_field('subtitle_ermac', 'options'); ?></h2>
                        <?php the_field('content_block_ermac', 'options'); ?>
                        <a href="<?php the_field('page_link_ermac', 'options'); ?>" class="back"><?php the_field('button_label_ermac', 'options'); ?></a>
                        <!-- /.back -->
                    </div>
                    <!-- /#error-page -->
                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!-- /#regular-page -->

<?php
get_footer();

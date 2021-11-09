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

    <div id="blog-page">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-body">
                        <div class="blog-headline">
                            <div class="blog-meta">
                                <span>
                                    <?php
                                    global $post;
                                    $categories = get_the_category($post->ID);
                                    $cat_link = get_category_link($categories[0]->cat_ID);
                                    echo '<a href="'.$cat_link.'">'.$categories[0]->cat_name.'</a>' 
                                    ?>                                  
                                </span> 
                                <span><?php echo get_the_date( 'F j, Y' ); ?></span>
                            </div>
                            <!-- /.blog-meta -->
                            <h1><?php the_title(); ?></h1>
                            <div class="author-desc">
                                <?php echo get_avatar( get_the_author_meta( 'ID' ), 60 ); ?>
                                <div class="author-content">
                                    <a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>"><?php the_author(); ?></a>
                                    <p><?php the_author_description(); ?></p>
                                </div>
                                <!-- /.author-content -->
                            </div> 
                        </div>
                        <!-- /.blog-headline -->
                        <div class="blog-content">

                            <div class="featured-photo">
                                <?php
                                $imageID = get_field('featured_image_blog');
                                $image = wp_get_attachment_image_src( $imageID, 'full-image' );
                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                ?> 

                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 
                            </div>
                            <!-- /.featured-photo -->

                            <?php if( have_rows('content_layout_blog') ): ?>
                                <?php while( have_rows('content_layout_blog') ): the_row(); ?>
                                    <?php if( get_row_layout() == 'intro_text' ): ?>

                                        <div class="intro-text">
                                            <?php the_sub_field('intro_content'); ?>
                                        </div>

                                    <?php elseif( get_row_layout() == 'full_width_content' ): ?>

                                        <div class="full-content">
                                            <?php the_sub_field('content_block'); ?>
                                        </div>
                                        <!-- // full  -->

                                    <?php elseif( get_row_layout() == 'full_width_image' ): ?>

                                        <div class="blog-photo">
                                                <?php
                                                $imageID = get_sub_field('featured_image');
                                                $image = wp_get_attachment_image_src( $imageID, 'fullwidth-image' );
                                                $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                ?> 

                                                <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                            <?php if( get_sub_field('image_caption') ): ?>
                                            <div class="photo-caption">
                                                <span><?php the_sub_field('image_caption'); ?></span>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                        <!-- /.blog-photo -->   
                                        
                                    <?php elseif( get_row_layout() == 'video' ): ?>

                                        <div class="video-holder">
                                            <?php the_sub_field('embedded_code'); ?>
                                        </div>

                                    <?php elseif( get_row_layout() == 'accordion' ): ?>				

                                        <div class="accordion-section">
                                            <?php if( get_sub_field('accordion_title') ): ?>
                                                <h3><?php the_sub_field('accordion_title'); ?></h3>
                                            <?php endif; ?>
                                            <div class="accordion-list">
                                            <?php if( have_rows('accordion_list') ): ?>
                                                <?php while( have_rows('accordion_list') ): the_row(); ?>

                                                    <div class="panel">
                                                        <h4><?php the_sub_field('heading'); ?></h4>
                                                        <div class="panel__content">
                                                            <?php the_sub_field('content'); ?>
                                                        </div>
                                                    </div>
                                                    <!-- /.panel -->
                                                <?php endwhile; ?>
                                            <?php endif; ?>
                                            </div>
                                            <!-- // acc  -->
                                        </div>
                                        <!-- // section  -->

                                    <?php elseif( get_row_layout() == 'quote_cta' ): ?>

                                        <div class="quote-cta--single">
                                            <span class="title"><?php the_sub_field('cta_title'); ?></span>
                                            <a href="#bottom-form" class="btn-cta"><?php the_sub_field('button_label'); ?></a>
                                        </div>
                                        <!-- // single  -->  

                                    <?php elseif( get_row_layout() == 'featured_article' ): ?>    
                                        <?php
                                            $post_objects = get_sub_field('featured_article_list');

                                            if( $post_objects ): ?>
                                                <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                    <?php setup_postdata($post); ?>
                                                        
                                                    <div class="featured-article">
                                                        <div class="blog-item">
                                                            <div class="blog-photo">
                                                                <a href="<?php echo get_permalink(); ?>" target="_blank">
                                                                    <?php 
                                                                    $values = get_field( 'featured_image_blog' );
                                                                    if ( $values ) { ?>

                                                                        <?php
                                                                        $imageID = get_field('featured_image_blog');
                                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                                        ?> 

                                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                                    <?php 
                                                                    } else { ?>
                                                                        
                                                                    <?php } ?>
                                                                </a>
                                                            </div>
                                                            <!-- /.blog-photo-->
                                                            <div class="blog-content">
                                                                <h2><a href="<?php echo get_permalink(); ?>" target="_blank"><?php the_title(); ?></a></h2>
                                                                <a href="<?php echo get_permalink(); ?>" class="btn-cta" target="_blank">Read More</a>
                                                            </div>
                                                            <!-- /.blog-content -->
                                                        </div>
                                                        <!-- /.blog-item -->
                                                    </div>
                                                    <!-- /.featured-article -->
                                                        
                                                <?php endforeach; ?>
                                            <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                        <?php endif; ?>
                                        <?php wp_reset_postdata(); ?>

                                    <?php elseif( get_row_layout() == 'services_module' ): ?>

                                        <section id="services-area" class="services-blog-module">
                                            <div class="services-list">
                                                <div class="row">

                                                    <?php
                                                        $post_objects = get_sub_field('services_list_blog_page');

                                                        if( $post_objects ): ?>
                                                            <?php foreach( $post_objects as $post): // variable must be called $post (IMPORTANT) ?>
                                                                <?php setup_postdata($post); ?>
                                                                
                                                                <div class="col-md-4">
                                                                    <a href="<?php echo get_permalink(); ?>" target="_blank">
                                                                        <div class="service-item">
                                                                            <h3><?php the_field('icon_serv'); ?> <?php the_title(); ?></h3>
                                                                            <i class="details-link">Details</i>
                                                                        </div>
                                                                        <!-- /.service-item -->
                                                                    </a>
                                                                </div>
                                                                <!-- /.col-md-4 -->

                                                            <?php endforeach; ?>
                                                        <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                                                    <?php endif; ?>

                                                </div>
                                                <!-- /.row -->
                                            </div>
                                            <!-- /.services-list -->
                                        </section>
                                        <!-- /#services-area -->
                                        
                                    <?php elseif( get_row_layout() == 'table' ): ?>

                                        <table style="width:100%" class="single-table">
                                            <thead>
                                                <tr role="row">
                                                <?php
                                                    // check if the repeater field has rows of data
                                                    if(have_rows('table_head_cells')):
                                                        // loop through the rows of data
                                                        while(have_rows('table_head_cells')) : the_row();
                                                            $hlabel = get_sub_field('table_cell_label_thead');
                                                            ?>  
                                                            <th tabindex="0" rowspan="1" colspan="1"><?php echo $hlabel; ?></th>
                                                        <?php endwhile;
                                                    else :
                                                        echo 'No data';
                                                    endif;
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php while ( have_posts() ) : the_post(); ?>
                                                <?php 
                                                // check for rows (parent repeater)
                                                if( have_rows('table_body_row') ): ?>
                                                    <?php 
                                                    // loop through rows (parent repeater)
                                                    while( have_rows('table_body_row') ): the_row(); ?>
                                                            <?php 
                                                            // check for rows (sub repeater)
                                                            if( have_rows('table_body_cells') ): ?>
                                                                <tr>
                                                                    <?php 
                                                                    // loop through rows (sub repeater)
                                                                    while( have_rows('table_body_cells') ): the_row();
                                                                        ?>
                                                                        <td><?php the_sub_field('table_cell_label_tbody'); ?></td>
                                                                    <?php endwhile; ?>
                                                                </tr>
                                                            <?php endif; //if( get_sub_field('') ): ?>
                                                    <?php endwhile; // while( has_sub_field('') ): ?>
                                                <?php endif; // if( get_field('') ): ?>
                                                <?php endwhile; // end of the loop. ?>
                                            </tbody>
                                        </table> 

                                    <?php endif; ?>
                                <?php endwhile; ?>
                            <?php endif; ?>                            

                        </div>
                        <!-- /.blog-content -->
                        <div class="blog-share">
                            <ul>
                                <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-yelp"></i></a></li>
                                <li><a href="#" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href="#" target="_blank"> <i class="fab fa-tumblr"></i></a></li>

                            </ul>
                        </div>
                        <!-- /.blog-share -->

                        <div id="free-estimate">
                                <div class="row" id="bottom-form">
                                    <div class="col-md-12">
                                        <div class="fit-wrap quote-intro">
                                            <h4>What are you moving?</h4>
                                            <div class="quote-form">
                                                <div class="quote-form-in">
                                                    <?php echo do_shortcode('[contact-form-7 id="368" title="Quick Estimate"]'); ?>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.fit-wrap -->
                                    </div>
                                    <!-- /.col-md-12 -->
                                </div>
                                <!-- /.row -->
                        </div>
                        <!-- /#free-estimate -->    

                        <div class="blog-navigation">
                            <?php $previous = get_previous_post();
                            $next = get_next_post(); ?>
                            <div class="previous blog-nav-item">
                                    <small>
                                    <div class="blog-nav-content">
                                        <?php if (strlen(get_previous_post()->post_title) > 0) { ?>
                                        <span class="direction">Previous</span>
                                        <?php } ?>
                                        <span class="title"><?php previous_post_link('%link'); ?></span>
                                    </div>
                                    <!-- /.blog-nav-content -->
                                </small>
                            </div>
                            <!-- /.previous blog-nav-item -->  
                            <div class="next blog-nav-item">
                                <small>
                                    <div class="blog-nav-content">
                                        <?php if (strlen(get_next_post()->post_title) > 0) { ?>
                                        <span class="direction">Next</span>
                                        <?php } ?>
                                        <span class="title"><?php next_post_link('%link'); ?></span>
                                    </div>
                                    <!-- /.blog-nav-content -->
                                </small>
                            </div>
                            <!-- /.next blog-nav-item -->  
                        </div>
                        <!-- /.blog-navigation -->
                        <div class="related-posts">
                            <span class="related-posts-title">Recent posts</span>
                            <!-- /.related-posts-title -->
                            <div class="row">

                            <?php
                            $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 4, 'post__not_in' =>  [ $post->ID ]) ); ?>  
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

                                    <div class="col-md-3">
                                        <div class="related-box">
                                            <div class="blog-photo">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <?php 
                                                    $values = get_field( 'featured_image_blog' );
                                                    if ( $values ) { ?>

                                                        <?php
                                                        $imageID = get_field('featured_image_blog');
                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                        ?> 

                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                    <?php 
                                                    } else { ?>
                                                        
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <!-- /.blog-photo-->
                                            <a href="<?php echo get_permalink(); ?>">
                                                <h4><?php the_title(); ?></h4>
                                                <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                                                <!-- /.date -->
                                            </a>
                                        </div>
                                        <!-- /.related-box -->
                                    </div>
                                    <!-- /.col-md-3 -->

                                    <?php endwhile; ?>
                            <?php wp_reset_postdata(); ?>    
                            <?php wp_reset_query(); ?>


                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.related-posts -->
                        <div class="related-posts">
                            <span class="related-posts-title">Related posts</span>
                            <!-- /.related-posts-title -->
                            <div class="row">

                            <?php
                            $categories =   get_the_category();
                            // print_r($categories);
                            $rp_query   =  new WP_Query ([
                                'posts_per_page'        =>  4,
                                'post__not_in'          =>  [ $post->ID ],
                                'cat'                   =>  !empty($categories) ? $categories[0]->term_id : null,

                            ]);

                            if ( $rp_query->have_posts() ) {
                                while( $rp_query->have_posts() ) {
                                    $rp_query->the_post();
                                    ?>

                                    <div class="col-md-3">
                                        <div class="related-box">
                                            <div class="blog-photo">
                                                <a href="<?php echo get_permalink(); ?>">
                                                    <?php 
                                                    $values = get_field( 'featured_image_blog' );
                                                    if ( $values ) { ?>

                                                        <?php
                                                        $imageID = get_field('featured_image_blog');
                                                        $image = wp_get_attachment_image_src( $imageID, 'blog-image' );
                                                        $alt_text = get_post_meta($imageID , '_wp_attachment_image_alt', true);
                                                        ?> 

                                                        <img class="img-responsive" alt="<?php echo $alt_text; ?>" src="<?php echo $image[0]; ?>" /> 

                                                    <?php 
                                                    } else { ?>
                                                        
                                                    <?php } ?>
                                                </a>
                                            </div>
                                            <!-- /.blog-photo-->
                                            <a href="<?php echo get_permalink(); ?>">
                                                <h4><?php the_title(); ?></h4>
                                                <span class="date"><?php echo get_the_date( 'F j, Y' ); ?></span>
                                                <!-- /.date -->
                                            </a>
                                        </div>
                                        <!-- /.related-box -->
                                    </div>
                                    <!-- /.col-md-3 -->

                                    <?php
                                    }
                                    wp_reset_postdata();
                                }
                            ?>

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.related-posts -->
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

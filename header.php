<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta name="google-site-verification" content="JrGPofQ2t4gXA_RXDY0jR1D89mBiTQS2_e2DmCtPU8o" />
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="icon" type="image/png"  href="<?php echo get_template_directory_uri(); ?>/img/ico/favicon.png">

	<meta name="ahrefs-site-verification" content="b6d355d34cf2473a151d4e7ec88ef43d1605fe1652e09c0e20b9c0f07a7e0e27">
	<meta name="google-site-verification" content="Ky9R08l4z90qq1UZNzGs8gb4bE9a8evDsGXL3_hcFqU" />

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TG5L4LP');</script>
	<!-- End Google Tag Manager -->


	<?php if( get_field('head_code_snippet', 'options') ): ?>
		<?php the_field('head_code_snippet', 'options'); ?>
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TG5L4LP"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

	<?php if( get_field('body_code_snippet', 'options') ): ?>
		<?php the_field('body_code_snippet', 'options'); ?>
	<?php endif; ?>

	<div class="menu-overlay"></div>
	<div class="main-menu-sidebar visible-xs visible-sm visible-md" id="menu">

		<header>
			<a href="javascript:;" class="close-menu-btn"><img src="<?php bloginfo('template_directory'); ?>/img/ico/close-x.svg" alt=""></a>
		</header>
		<!-- // header  -->


		<nav id="sidebar-menu-wrapper">
			<div id="menu">    
				<ul class="nav-links">
					<?php
					wp_nav_menu( array(
						'menu'              => 'mobile',
						'theme_location'    => 'mobile',
						'depth'             => 2,
						'container'         => false,
						'container_class'   => 'collapse navbar-collapse',
						'container_id'      => false,
						'menu_class'        => 'nav navbar-nav',
						'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
						'items_wrap' => '%3$s',
						'walker'            => new wp_bootstrap_navwalkermobile())
					);
					?>  
				</ul>
			</div>
			<!-- // menu  -->

		</nav> 
		<!-- // sidebar menu wrapper  -->

	</div>
	<!-- // main menu sidebar  -->	
	

        <div class="page-wrapper">
            <div id="menu_area" class="menu-area">

                <div id="cor-notice">
                    <?php the_field('notice_text_top', 'options'); ?>
                </div>

                <div id="menu-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <nav class="navbar navbar-light navbar-expand-lg mainmenu">

                                    <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php the_field('website_logo_general', 'options'); ?>" alt="<?php bloginfo('name'); ?>"></a>

                                    <!-- /.navbar-brand -->
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav ml-auto">

										<?php if( have_rows('menu_items_header_main', 'options') ): ?>
											<?php while( have_rows('menu_items_header_main', 'options') ): the_row(); ?>

												<?php if (get_sub_field('link_type') == 'Single Item') { ?>
													<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a></li>
												<?php } elseif (get_sub_field('link_type') == 'Dropdown') { ?>

													<li class="dropdown">
														<a class="dropdown-toggle" href="<?php the_sub_field('link_to_page'); ?>" aria-expanded="false"><?php the_sub_field('item_label'); ?></a>
														<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
															<?php if( have_rows('dropdown_items') ): ?>
																<?php while( have_rows('dropdown_items') ): the_row(); ?>
																	<li><a href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('label'); ?></a></li>
																<?php endwhile; ?>
															<?php endif; ?>
														</ul>
													</li>													

												<?php } elseif (get_sub_field('link_type') == 'Dropdown Multilevel') { ?>

													<li class="dropdown">
														<a class="dropdown-toggle" href="<?php the_sub_field('link_to_page'); ?>"><?php the_sub_field('item_label'); ?></a>
														<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">

															<?php if( have_rows('multilevel_items') ): ?>
																<?php while( have_rows('multilevel_items') ): the_row(); ?>

																	<?php if (get_sub_field('type_of_item') == 'Single Items') { ?>

																		<li><a href="<?php the_sub_field('item_link'); ?>"><?php the_sub_field('item_label_sub'); ?></a></li>

																	<?php } elseif (get_sub_field('type_of_item') == 'Dropdown Items') { ?>
																		<li class="dropdown">
																			<a class="dropdown-toggle" href="<?php the_sub_field('item_link'); ?>" id="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php the_sub_field('item_label_sub'); ?></a>
																			<ul class="dropdown-menu fade" aria-labelledby="navbarDropdown">
																				<?php if( have_rows('dropdown_items_sub') ): ?>
																				<?php while( have_rows('dropdown_items_sub') ): the_row(); ?>

																					<li><a href="<?php the_sub_field('link_sub_sub'); ?>"><?php the_sub_field('label_sub_sub'); ?></a></li>

																				<?php endwhile; ?>
																				<?php endif; ?>
																			</ul>
																		</li>
																	<?php } ?>   																

																<?php endwhile; ?>
															<?php endif; ?>

														</ul>
													</li>

												<?php } ?>   

											<?php endwhile; ?>
										<?php endif; ?>

                                        </ul>
                                        <!-- /.navbar-nav -->
                                        <div class="call-btn">

                                            <?php 
                                            $values = get_field( 'phone_number_top_cta' );
                                            if ( $values ) { ?>
                                                <a href="tel:<?php the_field('phone_number_top_cta'); ?>"><i class="fas fa-phone-alt"></i> <?php the_field('phone_number_top_cta'); ?></a>
                                            <?php 
                                            } else { ?>
                                                <a href="tel:<?php the_field('main_phone_number_top_gen', 'options'); ?>"><i class="fas fa-phone-alt"></i> <?php the_field('main_phone_number_top_gen', 'options'); ?></a>
                                            <?php } ?>
                                        
                                        </div>
                                        <!-- /.call-btn -->
                                        
                                        <div id="mobile-menu--btn" class="d-lg-none">
                                            <a href="javascript:;">
                                                <span></span>
                                                <span></span>
                                                <span></span>
                                                <div class="clearfix"></div>
                                            </a>
                                        </div>
                                        <!-- // mobile  -->	

                                    </div>
                                    <!-- /.navbar-collapse -->
                                </nav>
                                <!-- /.mainmenu -->
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.continer -->
                </div>
                <!-- /#menu-wrapper -->
            </div>
            <!-- // desktop menu  -->
            
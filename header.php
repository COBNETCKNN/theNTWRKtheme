<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-cursor">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Tablet & Desktop Header -->
<header class="hidden lg:block relative no-cursor">
    <div class="headerGrid grid grid-cols-6 container mx-auto py-6">
        <!-- Logo -->
        <div class="col-span-1 ml-10">
            <div class="logoWrapper">
                <a href="<?php echo site_url(); ?>">
                    <?php 
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'logo-size' );
                        if ( has_custom_logo() ) {
                            echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                    ?>
                </a>
            </div>
        </div>
        <!-- Nav elements -->
        <div class="col-span-5 my-auto flex justify-end mr-10">
            <div class="header_menu text-white font-jost">
                    <?php 
                    wp_nav_menu(
                        array(
                        'theme_location' => 'header_menu',
                        'container_class' => 'header-menu',
                        )
                    );
                    ?>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Header -->
<header>
  <nav id="navbar" class="lg:hidden w-full p-5 absolute z-50">
        <div class="container mx-auto">
            <div class="flex justify-between">
                <!-- LOGO SECTION -->
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) {
						the_custom_logo();
					} elseif ( $site_name ) {
						?>
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo bloginfo('name'); ?>" rel="home">
								<?php echo esc_html( $site_name ); ?>
							</a>
						</h1>
						<p class="site-description">
							<?php
							if ( $tagline ) {
								echo esc_html( $tagline );
							}
							?>
						</p>
					<?php } ?>
				</div>
                <!-- MENU ICON -->
                <button class="nav-toggler" data-target="#navigation">
                    <i class="text-2xl text-white fas fa-bars"></i>
                </button>
            </div>
        </div>
        <!-- DROPDOWN CONTAINER -->
        <div class="hidden navbar_grid__dropdown w-full h-screen absolute top-0 right-0 z-10 bg-black flex justify-between" id="navigation">

            <!-- DROPDOWN MENU -->
            <div class="header_dropdown bg-black flex justify-center items-center w-full h-screen">
                <div class="">
                    <!-- CLOSE BUTTON -->
                    <button class="nav_close__button nav-toggler close_button text-white text-4xl p-3 absolute top-2 right-2" data-target="#navigation">&#215;</button>
                    <!-- NAVIGATION -->
                    <div class="thentwrktheme_header__menuMobile text-white font-jost">
                        <?php 
                        wp_nav_menu(
                            array(
                            'theme_location' => 'header_menu',
                            'container_class' => 'header-menu',
                            )
                        );
                        ?>
                    </div>
                    <?php if( have_rows('footer_content_right_side', 21) ): ?>
                        <?php while( have_rows('footer_content_right_side', 21) ): the_row(); ?>
                                <div class="footerRight_socialMedia flex justify-center mt-14">
                                <?php
                                if( have_rows('footer_content_right_side_social_media_icons') ):
                                    while( have_rows('footer_content_right_side_social_media_icons') ) : the_row();

                                        $socialMedia_icon = get_sub_field('footer_content_right_side_repeater_icon');
                                        $socialMedia_link = get_sub_field('footer_content_right_side_repeater_link');
                                        $size = 'social-media-icons';
                                        if( $socialMedia_icon ) { ?>

                                        <a href="<?php echo $socialMedia_link; ?>" target="_blank"><?php echo wp_get_attachment_image( $socialMedia_icon, $size ); ?></a>

                                        <?php 
                                        }

                                    endwhile;
                                endif;
                                ?>
                                </div>
                                <?php
                        endwhile;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </nav>
</header>
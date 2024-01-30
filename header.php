<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title( '|', true, 'right' ); ?></title>

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="relative">
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
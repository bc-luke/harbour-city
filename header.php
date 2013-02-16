<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title( '|', true, 'right' ); ?></title>
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
        <![endif]-->
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
        <div class="container">
            <div class="row">
                <header class="header">
                    <div class="span5">
                        <?php $header_image = get_header_image();
                        if ( ! empty( $header_image ) ) : ?>
                            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php echo esc_attr( get_bloginfo( 'description', 'display' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /></a>
                        <?php endif; ?>
                    </div>
                    <div class="span7">
                        <?php get_template_part( 'social-media' ); ?>
                        <button type="button" class="visible-phone menu-toggle" data-toggle="dropdown">Menu</button>
                        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu menu-primary list-horizontal pull-right' ) ); ?>
                    </div>
                </header>
            </div>
            <div class="row">
                <div class="wrapper span12">
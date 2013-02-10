<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
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
        <div class="page container">
            <div class="row">
                <header class="header span12">

                <?php $header_image = get_header_image();
                if ( ! empty( $header_image ) ) : ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $header_image ); ?>" class="header-image" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="" /></a>
                <?php endif; ?>

                  <button type="button" class="visible-phone menu-toggle" data-toggle="dropdown">Menu</button>
                  <ul id="menu-primary-1" class="menu menu-primary menu-horizontal pull-right" role="menu">
                    <li><a tabindex="-1" href="#">Action</a></li>
                    <li><a tabindex="-1" href="#">Another action</a></li>
                    <li><a tabindex="-1" href="#">Something else here</a></li>
                  </ul>


                </header>
            </div>
            <div class="row">
                <div class="wrapper span12">
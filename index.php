<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/style.css" />
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
                <div class="content span12"></div>
            </div>
            <div class="row">
                <div class="footer span12">
                    <div class="row">
                            <ul id="widget-area-footer" class="widget-area">
                                <li class="widget span4">I'm a widget!</li> <!-- add span4 in register_sidebar call -->
                                <li class="widget span4">I'm a widget!</li>
                                <li class="widget span4">I'm a widget</li>
                            </ul>
                    </div>
                    <div class="row" role="contentinfo">
                        <span id="support" class="span4">Proudly supported by <a href="http://syd.swingpatrol.com/">Swing Patrol</a></span>
                        <div class="offset2 span6">
                            <ul id="menu-secondary-1" class="menu menu-secondary menu-horizontal pull-right" role="menu">
                                <li><a href="#">Privacy</a></li>

                                <li><a href="#">Terms of Use</a></li>

                                <li><a href="#">Sitemap</a></li>
                            </ul>
                            <span id="copyright" class="pull-right">&copy; 2013 Harbour City Hoppers</span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <script src="http://code.jquery.com/jquery-latest.js"></script>
        <?php wp_footer(); ?>
    </body>
</html>

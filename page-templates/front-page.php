<?php
/**
 * Template Name: Front Page Template
 *
 * Description: A page template that provides a key component of WordPress as a CMS
 * by meeting the need for a carefully crafted introductory page. The front page template
 * in Twenty Twelve consists of a page content area for adding text, images, video --
 * anything you'd like -- followed by front-page-only widgets in one or two columns.
 *
 * @package WordPress
 * @subpackage Harbour_City
 * @since Harbour City 1.0
 */

get_header(); ?>

<div class="main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>
        <?php echo get_post_format(); ?>
        <?php get_template_part( 'content', 'front-page' ); ?>

    <?php endwhile; // end of the loop. ?>

</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
                
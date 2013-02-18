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

<main id="front-page" class="main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

            <div class="row">
                <div class="offset7 span5">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <header class="entry-header hide">
                            <h1 class="entry-title"><?php the_title(); ?></h1>
                        </header>

                        <div class="entry-content">
                            <?php the_content(); ?>
                            <?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'harbour-city' ), 'after' => '</div>' ) ); ?>
                        </div><!-- .entry-content -->
                        <footer class="entry-meta">
                            <?php edit_post_link( __( 'Edit', 'harbour-city' ), '<span class="edit-link">', '</span>' ); ?>
                        </footer><!-- .entry-meta -->
                    </article><!-- #post -->
                </div>
            </div>

    <?php endwhile; // end of the loop. ?>

</main>

<?php get_sidebar(); ?>
<?php get_footer(); ?>
                
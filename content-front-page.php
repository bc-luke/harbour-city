<?php
/**
 * The template used for displaying page content in page.php and front-page.php
 *
 * @package WordPress
 * @subpackage Harbour_City
 * @since Harbour City 1.0
 */
?>
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

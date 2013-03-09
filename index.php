<?php get_header(); ?>

<main id="index" class="main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

    <?php endwhile; // end of the loop. ?>

</main>

<?php get_footer(); ?>
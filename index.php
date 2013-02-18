<?php get_header(); ?>

<div id="primary" class="main" role="main">

    <?php while ( have_posts() ) : the_post(); ?>

        <?php get_template_part( 'content', get_post_format() ); ?>

    <?php endwhile; // end of the loop. ?>

</div>

<?php get_footer(); ?>
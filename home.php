<?php get_header(); ?>

<div class="row nav-separate">
    <?php while ( have_posts() ) : the_post(); ?>
        <?php get_template_part( 'content', 'news' ); ?>
    <?php endwhile; // end of the loop. ?>
    <div class="col s12">
        <ul class="pagination center-align">
            <?php liceopac_pagination(); ?>
        </ul>
    </div>
</div><!-- #primary -->

<?php get_footer(); ?>
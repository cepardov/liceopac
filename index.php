<?php get_header(); ?>

<div class="row nav-separate">
    <?php if (have_posts()): while (have_posts()) : the_post(); ?>
    <div class="col s12 responsive-text text-justify">
        <?php if ( has_post_thumbnail()) : // Check if Thumbnail exists ?>
            <?php the_post_thumbnail(); // Fullsize image for the single post ?>
        <?php endif; ?>
        <?php the_content(); ?>
    </div>

    <?php video_embed(); ?>

    <div class="col s12">
        <?php the_images() ?>
    </div>

    <div class="center">
        <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-numposts="5"></div>
    </div>

    <div class="col s12">
        <div class="chip">
            <?php the_author(); ?>
        </div>
        <div class="chip">
            <?php the_category(', '); // Separated by commas ?>
        </div>
    </div>
<?php endwhile; ?>

<?php else: ?>
    <div class="container">
        <div class="row">
            <div class="col s12 m2">
                <h1>:(</h1>
            </div>
            <div class="col s12 m10">
                <h4>UPS!! La dirección a la que intentas acceder no existe.</h4>
            </div>
        </div>
    </div>
<?php endif; ?>
</div>

<?php get_footer(); ?>

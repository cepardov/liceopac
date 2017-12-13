<div id="post" class="col s12">
    <div class="card horizontal z-depth-2 hoverable grey lighten-3">
        <div class="row">
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <div class="col s12 m4 wp-post-img">
                    <?php the_post_thumbnail('medium',  array( 'class' => 'test' )); // Declare pixel size you need inside the array ?>
                </div>
            <?php endif; ?>
            <div class="col s12 m8 card-stacked">
                <span class="card-title grey-text darken-3"><strong><?php the_title(); ?></strong></span>
                <div class="card-content">
                    <p class="responsive-text"><?php echo wp_trim_excerpt(); ?></p>
                </div>
                <div class="card-action">
                    <div class="left">
                        <div class="chip">
                            <?php the_time('j F, Y'); ?> por <?php the_author(); ?>
                        </div>
                    </div>
                    <div class="right">
                        <a href="<?php the_permalink(); ?>" class="waves-effect blue-grey lighten-1 waves-light btn">Ver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
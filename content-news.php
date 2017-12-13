<?php
/**
 * Created by IntelliJ IDEA.
 * User: cepardov
 * Date: 25-09-17
 * Time: 15:03
 */
?>

<div class="col s12 m4">
    <a href="<?php the_permalink(); ?>">
        <div class="news z-depth-3">
            <?php if ( has_post_thumbnail()) : // Check if thumbnail exists ?>
                <?php the_post_thumbnail('medium',  array( 'class' => '' )); ?>
            <?php else:?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png">
            <?php endif; ?>
            <span class="news-title"><?php the_title(); ?></span>
        </div>
    </a>
</div>
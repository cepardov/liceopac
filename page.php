<?php get_header(); ?>

            <!-- <h1>< ?php the_title(); ?></h1>-->

            <?php if (have_posts()): while (have_posts()) : the_post(); ?>

                <!-- article -->
                <article id="post-<?php the_ID(); ?>">
                    <?php the_page(); ?>
                    <!-- < ?php comments_template( '', true ); // Remove if you don't want comments ?>-->

                    <br class="clear">

                    <?php edit_post_link(); ?>

                </article>
                <!-- /article -->

            <?php endwhile; ?>

            <?php else: ?>

                <!-- article -->
                <article>

                    <h2><?php _e( 'Sorry, nothing to display.', 'html5blank' ); ?></h2>

                </article>
                <!-- /article -->

            <?php endif; ?>

        </section>
        <!-- /section -->
    </main>


    <!-- footer -->
<?php get_footer(); ?>
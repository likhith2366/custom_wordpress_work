<?php
/**
 * Main Template File
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <div class="content-area">
            <div class="primary-content">
                <?php if (have_posts()) : ?>

                    <div class="content-grid">
                        <?php
                        while (have_posts()) :
                            the_post();
                            get_template_part('template-parts/content', 'card');
                        endwhile;
                        ?>
                    </div>

                    <?php newshub_pagination(); ?>

                <?php else : ?>

                    <div class="no-posts-found">
                        <h2><?php _e('Nothing Found', 'newshub'); ?></h2>
                        <p><?php _e('It seems we can\'t find what you\'re looking for. Perhaps searching can help.', 'newshub'); ?></p>
                        <?php get_search_form(); ?>
                    </div>

                <?php endif; ?>
            </div>

            <?php get_sidebar(); ?>
        </div>
    </div>
</main>

<?php
get_footer();

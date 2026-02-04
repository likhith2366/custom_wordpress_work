<?php
/**
 * Archive Template for Featured Articles
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Featured Articles', 'newshub'); ?></h1>
            <p class="archive-description"><?php _e('Our handpicked selection of the most important stories', 'newshub'); ?></p>
        </header>

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
                <h2><?php _e('No Featured Articles Found', 'newshub'); ?></h2>
                <p><?php _e('Check back soon for our latest featured content.', 'newshub'); ?></p>
            </div>

        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

<?php
/**
 * Archive Template
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <header class="page-header">
            <?php
            the_archive_title('<h1 class="page-title">', '</h1>');
            the_archive_description('<div class="archive-description">', '</div>');
            ?>
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
                <h2><?php _e('Nothing Found', 'newshub'); ?></h2>
                <p><?php _e('It seems we can\'t find what you\'re looking for.', 'newshub'); ?></p>
            </div>

        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

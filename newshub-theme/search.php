<?php
/**
 * Search Results Template
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(
                    __('Search Results for: %s', 'newshub'),
                    '<span>' . get_search_query() . '</span>'
                );
                ?>
            </h1>
        </header>

        <?php if (have_posts()) : ?>

            <div class="search-results-count">
                <p>
                    <?php
                    global $wp_query;
                    printf(
                        _n(
                            'Found %s result',
                            'Found %s results',
                            $wp_query->found_posts,
                            'newshub'
                        ),
                        number_format_i18n($wp_query->found_posts)
                    );
                    ?>
                </p>
            </div>

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

            <div class="no-results">
                <h2><?php _e('Nothing Found', 'newshub'); ?></h2>
                <p><?php _e('Sorry, but nothing matched your search terms. Please try again with different keywords.', 'newshub'); ?></p>

                <div class="search-again" style="max-width: 600px; margin: 2rem auto;">
                    <?php get_search_form(); ?>
                </div>

                <div class="search-tips" style="margin-top: 2rem; padding: 2rem; background-color: var(--bg-gray); border-radius: var(--border-radius);">
                    <h3><?php _e('Search Tips:', 'newshub'); ?></h3>
                    <ul style="list-style: disc; padding-left: 2rem;">
                        <li><?php _e('Check your spelling', 'newshub'); ?></li>
                        <li><?php _e('Try more general keywords', 'newshub'); ?></li>
                        <li><?php _e('Try different keywords', 'newshub'); ?></li>
                        <li><?php _e('Try fewer keywords', 'newshub'); ?></li>
                    </ul>
                </div>
            </div>

        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

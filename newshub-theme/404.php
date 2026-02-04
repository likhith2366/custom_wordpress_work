<?php
/**
 * 404 Error Page Template
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <div class="error-404-content" style="text-align: center; padding: 4rem 0;">
            <h1 class="error-404-title" style="font-size: 6rem; margin-bottom: 1rem; color: var(--primary-color);">404</h1>
            <h2 class="error-404-heading"><?php _e('Oops! Page Not Found', 'newshub'); ?></h2>
            <p class="error-404-message"><?php _e('The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.', 'newshub'); ?></p>

            <div class="error-404-search" style="max-width: 600px; margin: 2rem auto;">
                <p><?php _e('Try searching for what you need:', 'newshub'); ?></p>
                <?php get_search_form(); ?>
            </div>

            <div class="error-404-actions" style="margin-top: 2rem;">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="submit-button">
                    <?php _e('Go to Homepage', 'newshub'); ?>
                </a>
            </div>

            <?php
            // Display recent posts
            $recent_posts = new WP_Query(array(
                'posts_per_page' => 3,
                'post_status'    => 'publish',
            ));

            if ($recent_posts->have_posts()) :
            ?>
                <div class="error-404-recent-posts" style="margin-top: 3rem;">
                    <h3><?php _e('Or check out our recent posts:', 'newshub'); ?></h3>
                    <div class="content-grid">
                        <?php
                        while ($recent_posts->have_posts()) :
                            $recent_posts->the_post();
                            get_template_part('template-parts/content', 'card');
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</main>

<?php
get_footer();

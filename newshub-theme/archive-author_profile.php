<?php
/**
 * Archive Template for Author Profiles
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Our Authors', 'newshub'); ?></h1>
            <p class="archive-description"><?php _e('Meet the talented writers behind our stories', 'newshub'); ?></p>
        </header>

        <?php if (have_posts()) : ?>

            <div class="authors-grid">
                <?php
                while (have_posts()) :
                    the_post();
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('author-card'); ?>>
                        <a href="<?php the_permalink(); ?>" class="author-card-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="author-card-image">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="author-card-content">
                                <h2 class="author-card-name"><?php the_title(); ?></h2>

                                <?php if (function_exists('get_field') && get_field('author_position')) : ?>
                                    <p class="author-card-position"><?php echo esc_html(get_field('author_position')); ?></p>
                                <?php endif; ?>

                                <?php if (has_excerpt()) : ?>
                                    <div class="author-card-excerpt">
                                        <?php the_excerpt(); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </a>
                    </article>
                <?php endwhile; ?>
            </div>

            <?php newshub_pagination(); ?>

        <?php else : ?>

            <div class="no-posts-found">
                <h2><?php _e('No Author Profiles Found', 'newshub'); ?></h2>
            </div>

        <?php endif; ?>
    </div>
</main>

<?php
get_footer();

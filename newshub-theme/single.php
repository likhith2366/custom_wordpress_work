<?php
/**
 * Single Post Template
 *
 * @package NewsHub
 */

get_header();
?>

<main class="site-content">
    <div class="container">
        <?php
        while (have_posts()) :
            the_post();
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="single-post-header">
                    <?php the_title('<h1 class="single-post-title">', '</h1>'); ?>

                    <div class="single-post-meta">
                        <span class="post-date">
                            <?php echo get_the_date(); ?>
                        </span>
                        <span class="post-author">
                            <?php _e('By', 'newshub'); ?> <?php the_author_posts_link(); ?>
                        </span>
                        <?php if (function_exists('get_field') && get_field('reading_time')) : ?>
                            <span class="reading-time">
                                <?php echo get_field('reading_time'); ?> <?php _e('min read', 'newshub'); ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (has_category()) : ?>
                        <div class="post-categories">
                            <?php the_category(', '); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="featured-image-container">
                        <?php the_post_thumbnail('newshub-featured', array('class' => 'featured-image')); ?>
                    </div>
                <?php endif; ?>

                <div class="entry-content">
                    <?php
                    the_content();

                    wp_link_pages(array(
                        'before' => '<div class="page-links">' . __('Pages:', 'newshub'),
                        'after'  => '</div>',
                    ));
                    ?>
                </div>

                <footer class="entry-footer">
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <strong><?php _e('Tags:', 'newshub'); ?></strong>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <?php
                    // Author bio
                    if (get_the_author_meta('description')) :
                    ?>
                        <div class="author-bio">
                            <div class="author-avatar">
                                <?php echo get_avatar(get_the_author_meta('ID'), 80); ?>
                            </div>
                            <div class="author-info">
                                <h3><?php _e('About', 'newshub'); ?> <?php the_author(); ?></h3>
                                <p><?php the_author_meta('description'); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </footer>
            </article>

            <?php
            // Related posts
            newshub_related_posts(get_the_ID(), 3);

            // Comments
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();

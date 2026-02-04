<?php
/**
 * Template part for displaying post cards
 *
 * @package NewsHub
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
    <?php if (has_post_thumbnail()) : ?>
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('newshub-thumbnail', array('class' => 'post-thumbnail')); ?>
        </a>
    <?php endif; ?>

    <div class="post-content">
        <?php
        // Display featured badge for featured articles
        if (get_post_type() === 'featured_article' && function_exists('get_field')) {
            $badge_text = get_field('featured_badge') ?: 'FEATURED';
            echo '<span class="post-category">' . esc_html($badge_text) . '</span>';
        } elseif (has_category()) {
            $categories = get_the_category();
            if (!empty($categories)) {
                echo '<span class="post-category">' . esc_html($categories[0]->name) . '</span>';
            }
        }
        ?>

        <h2 class="post-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>

        <?php newshub_post_meta(); ?>

        <div class="post-excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="read-more">
            <?php _e('Read More', 'newshub'); ?> &rarr;
        </a>
    </div>
</article>

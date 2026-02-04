<?php
/**
 * Single Author Profile Template
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
            <article id="post-<?php the_ID(); ?>" <?php post_class('author-profile-single'); ?>>
                <header class="author-profile-header">
                    <div class="author-profile-image">
                        <?php
                        if (has_post_thumbnail()) {
                            the_post_thumbnail('medium', array('class' => 'profile-image'));
                        }
                        ?>
                    </div>

                    <div class="author-profile-info">
                        <?php the_title('<h1 class="author-name">', '</h1>'); ?>

                        <?php if (function_exists('get_field') && get_field('author_position')) : ?>
                            <p class="author-position"><?php echo esc_html(get_field('author_position')); ?></p>
                        <?php endif; ?>

                        <div class="author-social-links">
                            <?php if (function_exists('get_field')) : ?>
                                <?php if (get_field('author_email')) : ?>
                                    <a href="mailto:<?php echo esc_attr(get_field('author_email')); ?>" class="social-link email">
                                        Email
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('author_twitter')) : ?>
                                    <a href="https://twitter.com/<?php echo esc_attr(get_field('author_twitter')); ?>" target="_blank" class="social-link twitter">
                                        Twitter
                                    </a>
                                <?php endif; ?>

                                <?php if (get_field('author_linkedin')) : ?>
                                    <a href="<?php echo esc_url(get_field('author_linkedin')); ?>" target="_blank" class="social-link linkedin">
                                        LinkedIn
                                    </a>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </header>

                <div class="author-profile-content">
                    <?php if (function_exists('get_field') && get_field('author_bio')) : ?>
                        <div class="author-bio-full">
                            <h2><?php _e('Biography', 'newshub'); ?></h2>
                            <?php echo get_field('author_bio'); ?>
                        </div>
                    <?php endif; ?>

                    <?php the_content(); ?>
                </div>

                <?php
                // Get posts by this author (if they're a WordPress user)
                $author_posts = new WP_Query(array(
                    'author_name'    => get_the_title(),
                    'posts_per_page' => 6,
                    'post_type'      => array('post', 'featured_article'),
                ));

                if ($author_posts->have_posts()) :
                ?>
                    <div class="author-articles">
                        <h2><?php _e('Articles by', 'newshub'); ?> <?php the_title(); ?></h2>
                        <div class="content-grid">
                            <?php
                            while ($author_posts->have_posts()) :
                                $author_posts->the_post();
                                get_template_part('template-parts/content', 'card');
                            endwhile;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
            </article>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();

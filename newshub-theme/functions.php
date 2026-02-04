<?php
/**
 * NewsHub Theme Functions
 *
 * @package NewsHub
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function newshub_theme_setup() {
    // Add theme support
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
    add_theme_support('custom-logo', array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
    ));
    add_theme_support('automatic-feed-links');
    add_theme_support('responsive-embeds');
    add_theme_support('align-wide');

    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'newshub'),
        'footer'  => __('Footer Menu', 'newshub'),
    ));

    // Add image sizes
    add_image_size('newshub-featured', 1200, 600, true);
    add_image_size('newshub-thumbnail', 400, 300, true);
    add_image_size('newshub-medium', 800, 500, true);
}
add_action('after_setup_theme', 'newshub_theme_setup');

/**
 * Register Widget Areas
 */
function newshub_widgets_init() {
    register_sidebar(array(
        'name'          => __('Main Sidebar', 'newshub'),
        'id'            => 'sidebar-1',
        'description'   => __('Appears on blog posts and pages', 'newshub'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 1', 'newshub'),
        'id'            => 'footer-1',
        'description'   => __('First footer widget area', 'newshub'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 2', 'newshub'),
        'id'            => 'footer-2',
        'description'   => __('Second footer widget area', 'newshub'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));

    register_sidebar(array(
        'name'          => __('Footer Widget 3', 'newshub'),
        'id'            => 'footer-3',
        'description'   => __('Third footer widget area', 'newshub'),
        'before_widget' => '<div id="%1$s" class="footer-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'newshub_widgets_init');

/**
 * Enqueue Scripts and Styles
 */
function newshub_scripts() {
    // Main stylesheet
    wp_enqueue_style('newshub-style', get_stylesheet_uri(), array(), '1.0.0');

    // Main JavaScript
    wp_enqueue_script('newshub-script', get_template_directory_uri() . '/js/main.js', array(), '1.0.0', true);

    // Comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'newshub_scripts');

/**
 * Register Custom Post Types
 */
function newshub_register_post_types() {
    // Featured Articles Post Type
    register_post_type('featured_article', array(
        'labels' => array(
            'name'               => __('Featured Articles', 'newshub'),
            'singular_name'      => __('Featured Article', 'newshub'),
            'add_new'            => __('Add New', 'newshub'),
            'add_new_item'       => __('Add New Featured Article', 'newshub'),
            'edit_item'          => __('Edit Featured Article', 'newshub'),
            'new_item'           => __('New Featured Article', 'newshub'),
            'view_item'          => __('View Featured Article', 'newshub'),
            'search_items'       => __('Search Featured Articles', 'newshub'),
            'not_found'          => __('No featured articles found', 'newshub'),
            'not_found_in_trash' => __('No featured articles found in trash', 'newshub'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'featured'),
        'supports'            => array('title', 'editor', 'thumbnail', 'excerpt', 'author', 'comments'),
        'menu_icon'           => 'dashicons-star-filled',
        'show_in_rest'        => true,
        'taxonomies'          => array('category', 'post_tag'),
    ));

    // Author Profiles Post Type
    register_post_type('author_profile', array(
        'labels' => array(
            'name'               => __('Author Profiles', 'newshub'),
            'singular_name'      => __('Author Profile', 'newshub'),
            'add_new'            => __('Add New', 'newshub'),
            'add_new_item'       => __('Add New Author Profile', 'newshub'),
            'edit_item'          => __('Edit Author Profile', 'newshub'),
            'new_item'           => __('New Author Profile', 'newshub'),
            'view_item'          => __('View Author Profile', 'newshub'),
            'search_items'       => __('Search Author Profiles', 'newshub'),
            'not_found'          => __('No author profiles found', 'newshub'),
            'not_found_in_trash' => __('No author profiles found in trash', 'newshub'),
        ),
        'public'              => true,
        'has_archive'         => true,
        'rewrite'             => array('slug' => 'authors'),
        'supports'            => array('title', 'editor', 'thumbnail'),
        'menu_icon'           => 'dashicons-id',
        'show_in_rest'        => true,
    ));
}
add_action('init', 'newshub_register_post_types');

/**
 * Register Custom Taxonomies
 */
function newshub_register_taxonomies() {
    // Article Topics Taxonomy
    register_taxonomy('article_topic', array('post', 'featured_article'), array(
        'labels' => array(
            'name'              => __('Topics', 'newshub'),
            'singular_name'     => __('Topic', 'newshub'),
            'search_items'      => __('Search Topics', 'newshub'),
            'all_items'         => __('All Topics', 'newshub'),
            'parent_item'       => __('Parent Topic', 'newshub'),
            'parent_item_colon' => __('Parent Topic:', 'newshub'),
            'edit_item'         => __('Edit Topic', 'newshub'),
            'update_item'       => __('Update Topic', 'newshub'),
            'add_new_item'      => __('Add New Topic', 'newshub'),
            'new_item_name'     => __('New Topic Name', 'newshub'),
            'menu_name'         => __('Topics', 'newshub'),
        ),
        'hierarchical'      => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'topic'),
        'show_in_rest'      => true,
    ));
}
add_action('init', 'newshub_register_taxonomies');

/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {
    acf_add_options_page(array(
        'page_title' => __('Theme Settings', 'newshub'),
        'menu_title' => __('Theme Settings', 'newshub'),
        'menu_slug'  => 'theme-settings',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ));
}

/**
 * Custom Excerpt Length
 */
function newshub_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'newshub_excerpt_length');

/**
 * Custom Excerpt More
 */
function newshub_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'newshub_excerpt_more');

/**
 * Custom Post Meta Display
 */
function newshub_post_meta() {
    ?>
    <div class="post-meta">
        <span class="post-date">
            <i class="icon-calendar"></i>
            <?php echo get_the_date(); ?>
        </span>
        <span class="post-author">
            <i class="icon-user"></i>
            <?php the_author_posts_link(); ?>
        </span>
        <?php if (has_category()) : ?>
            <span class="post-categories">
                <?php the_category(', '); ?>
            </span>
        <?php endif; ?>
    </div>
    <?php
}

/**
 * Custom Pagination
 */
function newshub_pagination() {
    global $wp_query;

    if ($wp_query->max_num_pages <= 1) {
        return;
    }

    $big = 999999999;

    echo '<div class="pagination">';
    echo paginate_links(array(
        'base'      => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format'    => '?paged=%#%',
        'current'   => max(1, get_query_var('paged')),
        'total'     => $wp_query->max_num_pages,
        'prev_text' => __('&laquo; Previous', 'newshub'),
        'next_text' => __('Next &raquo;', 'newshub'),
    ));
    echo '</div>';
}

/**
 * Contact Form Handler
 */
function newshub_handle_contact_form() {
    if (!isset($_POST['newshub_contact_nonce']) ||
        !wp_verify_nonce($_POST['newshub_contact_nonce'], 'newshub_contact_form')) {
        wp_die(__('Security check failed', 'newshub'));
    }

    $name = sanitize_text_field($_POST['contact_name']);
    $email = sanitize_email($_POST['contact_email']);
    $subject = sanitize_text_field($_POST['contact_subject']);
    $message = sanitize_textarea_field($_POST['contact_message']);

    // Validate
    if (empty($name) || empty($email) || empty($message)) {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
        exit;
    }

    if (!is_email($email)) {
        wp_redirect(add_query_arg('contact', 'invalid_email', wp_get_referer()));
        exit;
    }

    // Send email
    $to = get_option('admin_email');
    $email_subject = sprintf(__('[%s] Contact Form: %s', 'newshub'), get_bloginfo('name'), $subject);
    $email_message = sprintf(
        __("Name: %s\nEmail: %s\n\nMessage:\n%s", 'newshub'),
        $name,
        $email,
        $message
    );
    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $name . ' <' . $email . '>'
    );

    $sent = wp_mail($to, $email_subject, $email_message, $headers);

    if ($sent) {
        wp_redirect(add_query_arg('contact', 'success', wp_get_referer()));
    } else {
        wp_redirect(add_query_arg('contact', 'error', wp_get_referer()));
    }
    exit;
}
add_action('admin_post_nopriv_newshub_contact', 'newshub_handle_contact_form');
add_action('admin_post_newshub_contact', 'newshub_handle_contact_form');

/**
 * Add ACF Field Groups Programmatically
 */
function newshub_register_acf_fields() {
    if (!function_exists('acf_add_local_field_group')) {
        return;
    }

    // Hero Section Fields
    acf_add_local_field_group(array(
        'key' => 'group_hero_section',
        'title' => 'Hero Section',
        'fields' => array(
            array(
                'key' => 'field_hero_title',
                'label' => 'Hero Title',
                'name' => 'hero_title',
                'type' => 'text',
                'default_value' => 'Welcome to NewsHub',
            ),
            array(
                'key' => 'field_hero_description',
                'label' => 'Hero Description',
                'name' => 'hero_description',
                'type' => 'textarea',
                'rows' => 3,
                'default_value' => 'Your source for the latest news and stories',
            ),
            array(
                'key' => 'field_show_hero',
                'label' => 'Show Hero Section',
                'name' => 'show_hero',
                'type' => 'true_false',
                'default_value' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'page_template',
                    'operator' => '==',
                    'value' => 'default',
                ),
            ),
        ),
    ));

    // Author Profile Fields
    acf_add_local_field_group(array(
        'key' => 'group_author_profile',
        'title' => 'Author Profile Details',
        'fields' => array(
            array(
                'key' => 'field_author_position',
                'label' => 'Position',
                'name' => 'author_position',
                'type' => 'text',
            ),
            array(
                'key' => 'field_author_bio',
                'label' => 'Biography',
                'name' => 'author_bio',
                'type' => 'wysiwyg',
                'tabs' => 'all',
                'toolbar' => 'basic',
            ),
            array(
                'key' => 'field_author_twitter',
                'label' => 'Twitter Handle',
                'name' => 'author_twitter',
                'type' => 'text',
                'prepend' => '@',
            ),
            array(
                'key' => 'field_author_linkedin',
                'label' => 'LinkedIn URL',
                'name' => 'author_linkedin',
                'type' => 'url',
            ),
            array(
                'key' => 'field_author_email',
                'label' => 'Email Address',
                'name' => 'author_email',
                'type' => 'email',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'author_profile',
                ),
            ),
        ),
    ));

    // Featured Article Fields
    acf_add_local_field_group(array(
        'key' => 'group_featured_article',
        'title' => 'Featured Article Settings',
        'fields' => array(
            array(
                'key' => 'field_featured_badge',
                'label' => 'Featured Badge Text',
                'name' => 'featured_badge',
                'type' => 'text',
                'default_value' => 'FEATURED',
            ),
            array(
                'key' => 'field_featured_priority',
                'label' => 'Priority',
                'name' => 'featured_priority',
                'type' => 'number',
                'min' => 1,
                'max' => 10,
                'default_value' => 5,
            ),
            array(
                'key' => 'field_reading_time',
                'label' => 'Reading Time (minutes)',
                'name' => 'reading_time',
                'type' => 'number',
                'min' => 1,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'featured_article',
                ),
            ),
        ),
    ));
}
add_action('acf/init', 'newshub_register_acf_fields');

/**
 * Breadcrumb Navigation
 */
function newshub_breadcrumb() {
    if (is_front_page()) {
        return;
    }

    echo '<nav class="breadcrumb">';
    echo '<a href="' . home_url('/') . '">' . __('Home', 'newshub') . '</a>';

    if (is_category() || is_single()) {
        echo ' &raquo; ';
        the_category(' &raquo; ');
        if (is_single()) {
            echo ' &raquo; ';
            the_title();
        }
    } elseif (is_page()) {
        echo ' &raquo; ';
        echo the_title();
    }

    echo '</nav>';
}

/**
 * Related Posts Function
 */
function newshub_related_posts($post_id, $limit = 3) {
    $categories = wp_get_post_categories($post_id);

    if (empty($categories)) {
        return;
    }

    $args = array(
        'category__in'   => $categories,
        'post__not_in'   => array($post_id),
        'posts_per_page' => $limit,
        'orderby'        => 'rand',
    );

    $related_posts = new WP_Query($args);

    if ($related_posts->have_posts()) {
        echo '<div class="related-posts">';
        echo '<h3>' . __('Related Articles', 'newshub') . '</h3>';
        echo '<div class="content-grid">';

        while ($related_posts->have_posts()) {
            $related_posts->the_post();
            get_template_part('template-parts/content', 'card');
        }

        echo '</div>';
        echo '</div>';

        wp_reset_postdata();
    }
}

/**
 * Security Enhancements
 */
// Remove WordPress version from head
remove_action('wp_head', 'wp_generator');

// Remove Windows Live Writer manifest
remove_action('wp_head', 'wlwmanifest_link');

// Remove RSD link
remove_action('wp_head', 'rsd_link');

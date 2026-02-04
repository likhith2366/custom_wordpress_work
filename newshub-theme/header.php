<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div class="site-wrapper">
    <header class="site-header">
        <div class="container">
            <div class="header-container">
                <div class="site-branding">
                    <?php if (has_custom_logo()) : ?>
                        <?php the_custom_logo(); ?>
                    <?php else : ?>
                        <h1 class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                        </h1>
                        <?php
                        $description = get_bloginfo('description', 'display');
                        if ($description || is_customize_preview()) :
                        ?>
                            <p class="site-description"><?php echo $description; ?></p>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>

                <button class="menu-toggle" aria-controls="primary-navigation" aria-expanded="false">
                    <span class="menu-icon">☰</span> Menu
                </button>

                <nav class="main-navigation" id="primary-navigation">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                        'fallback_cb'    => false,
                    ));
                    ?>
                </nav>
            </div>
        </div>
    </header>

    <?php
    // Display hero section on front page or pages with ACF field enabled
    if (is_front_page() || (function_exists('get_field') && get_field('show_hero'))) :
        $hero_title = function_exists('get_field') && get_field('hero_title') ? get_field('hero_title') : 'Welcome to NewsHub';
        $hero_description = function_exists('get_field') && get_field('hero_description') ? get_field('hero_description') : 'Your source for the latest news and stories';
    ?>
        <section class="hero-section">
            <div class="container">
                <div class="hero-content">
                    <h2 class="hero-title"><?php echo esc_html($hero_title); ?></h2>
                    <p class="hero-description"><?php echo esc_html($hero_description); ?></p>
                </div>
            </div>
        </section>
    <?php endif; ?>

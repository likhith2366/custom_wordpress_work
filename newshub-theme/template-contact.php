<?php
/**
 * Template Name: Contact Page
 * Description: A custom template for contact page with contact form
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
                <header class="page-header">
                    <?php the_title('<h1 class="page-title">', '</h1>'); ?>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>

                    <?php
                    // Display form status messages
                    if (isset($_GET['contact'])) {
                        $status = $_GET['contact'];
                        switch ($status) {
                            case 'success':
                                echo '<div class="form-message success">' . __('Thank you! Your message has been sent successfully.', 'newshub') . '</div>';
                                break;
                            case 'error':
                                echo '<div class="form-message error">' . __('Sorry, there was an error sending your message. Please try again.', 'newshub') . '</div>';
                                break;
                            case 'invalid_email':
                                echo '<div class="form-message error">' . __('Please enter a valid email address.', 'newshub') . '</div>';
                                break;
                        }
                    }
                    ?>

                    <form class="contact-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="newshub_contact">
                        <?php wp_nonce_field('newshub_contact_form', 'newshub_contact_nonce'); ?>

                        <div class="form-group">
                            <label for="contact_name"><?php _e('Name', 'newshub'); ?> <span class="required">*</span></label>
                            <input type="text" id="contact_name" name="contact_name" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_email"><?php _e('Email', 'newshub'); ?> <span class="required">*</span></label>
                            <input type="email" id="contact_email" name="contact_email" required>
                        </div>

                        <div class="form-group">
                            <label for="contact_subject"><?php _e('Subject', 'newshub'); ?></label>
                            <input type="text" id="contact_subject" name="contact_subject">
                        </div>

                        <div class="form-group">
                            <label for="contact_message"><?php _e('Message', 'newshub'); ?> <span class="required">*</span></label>
                            <textarea id="contact_message" name="contact_message" rows="6" required></textarea>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="submit-button"><?php _e('Send Message', 'newshub'); ?></button>
                        </div>
                    </form>
                </div>
            </article>

        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();

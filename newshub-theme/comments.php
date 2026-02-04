<?php
/**
 * Comments Template
 *
 * @package NewsHub
 */

if (post_password_required()) {
    return;
}
?>

<div id="comments" class="comments-area">
    <?php if (have_comments()) : ?>
        <h2 class="comments-title">
            <?php
            $comment_count = get_comments_number();
            printf(
                _n(
                    '%s Comment',
                    '%s Comments',
                    $comment_count,
                    'newshub'
                ),
                number_format_i18n($comment_count)
            );
            ?>
        </h2>

        <ol class="comment-list">
            <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => true,
                'avatar_size' => 50,
            ));
            ?>
        </ol>

        <?php
        the_comments_navigation();

        // If comments are closed and there are comments
        if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) :
        ?>
            <p class="no-comments"><?php _e('Comments are closed.', 'newshub'); ?></p>
        <?php endif; ?>

    <?php endif; ?>

    <?php
    comment_form(array(
        'title_reply'         => __('Leave a Comment', 'newshub'),
        'title_reply_to'      => __('Leave a Reply to %s', 'newshub'),
        'cancel_reply_link'   => __('Cancel reply', 'newshub'),
        'label_submit'        => __('Post Comment', 'newshub'),
        'comment_field'       => '<p class="comment-form-comment"><label for="comment">' . __('Comment', 'newshub') . '</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
        'class_submit'        => 'submit-button',
    ));
    ?>
</div>

<style>
    .comments-area {
        margin-top: 3rem;
        padding-top: 3rem;
        border-top: 2px solid var(--border-color);
    }

    .comments-title {
        margin-bottom: 2rem;
        color: var(--text-color);
    }

    .comment-list {
        list-style: none;
        padding: 0;
    }

    .comment-list .comment {
        margin-bottom: 2rem;
        padding: 1.5rem;
        background-color: var(--bg-gray);
        border-radius: var(--border-radius);
    }

    .comment-list .children {
        list-style: none;
        margin-left: 2rem;
        margin-top: 1rem;
    }

    .comment-author img {
        border-radius: 50%;
        float: left;
        margin-right: 1rem;
    }

    .comment-metadata {
        font-size: 0.875rem;
        color: var(--text-light);
        margin-bottom: 1rem;
    }

    .comment-metadata a {
        color: var(--text-light);
    }

    .comment-content {
        clear: both;
        padding-top: 1rem;
    }

    .reply {
        margin-top: 1rem;
    }

    .reply a {
        font-size: 0.875rem;
        color: var(--primary-color);
        font-weight: 600;
    }

    .comment-respond {
        margin-top: 2rem;
        padding: 2rem;
        background-color: var(--bg-gray);
        border-radius: var(--border-radius);
    }

    .comment-reply-title {
        margin-bottom: 1.5rem;
    }

    .comment-form p {
        margin-bottom: 1.5rem;
    }

    .comment-form label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 600;
    }

    .comment-form input[type="text"],
    .comment-form input[type="email"],
    .comment-form input[type="url"],
    .comment-form textarea {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        font-family: var(--font-primary);
        font-size: 1rem;
    }

    .comment-form input:focus,
    .comment-form textarea:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .no-comments {
        padding: 1rem;
        background-color: var(--bg-gray);
        border-radius: var(--border-radius);
        color: var(--text-light);
    }
</style>

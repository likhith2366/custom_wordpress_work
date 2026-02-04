<?php
/**
 * Search Form Template
 *
 * @package NewsHub
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="search-field" class="screen-reader-text"><?php _e('Search for:', 'newshub'); ?></label>
    <div class="search-form-wrapper">
        <input type="search" id="search-field" class="search-field" placeholder="<?php esc_attr_e('Search...', 'newshub'); ?>" value="<?php echo get_search_query(); ?>" name="s">
        <button type="submit" class="search-submit">
            <span class="screen-reader-text"><?php _e('Search', 'newshub'); ?></span>
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.35-4.35"></path>
            </svg>
        </button>
    </div>
</form>

<style>
    .screen-reader-text {
        clip: rect(1px, 1px, 1px, 1px);
        position: absolute !important;
        height: 1px;
        width: 1px;
        overflow: hidden;
        word-wrap: normal !important;
    }

    .search-form-wrapper {
        display: flex;
        gap: 0.5rem;
    }

    .search-field {
        flex: 1;
        padding: 0.75rem 1rem;
        border: 1px solid var(--border-color);
        border-radius: var(--border-radius);
        font-size: 1rem;
    }

    .search-field:focus {
        outline: none;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
    }

    .search-submit {
        padding: 0.75rem 1.5rem;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: var(--border-radius);
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .search-submit:hover {
        background-color: var(--secondary-color);
    }
</style>

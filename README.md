# NewsHub WordPress Theme

A modern, responsive WordPress theme designed for blogs and news websites with Advanced Custom Fields integration, custom post types, and a clean, professional design.

## Features

### Core Features
- **Responsive Design**: Fully responsive layout that works beautifully on all devices
- **Advanced Custom Fields (ACF)**: Built-in ACF field groups for dynamic content management
- **Custom Post Types**:
  - Featured Articles with priority and reading time fields
  - Author Profiles with social media integration
- **Custom Taxonomies**: Article Topics for better content organization
- **Contact Form**: Built-in contact form with email functionality
- **Mobile Menu**: Responsive navigation with hamburger menu
- **SEO Friendly**: Clean, semantic HTML5 markup
- **Widget Ready**: Multiple widget areas (sidebar and footer)

### Design Features
- Modern, clean design with CSS custom properties
- Card-based layout for blog posts
- Sticky header navigation
- Hero section with ACF customization
- Related posts functionality
- Author bio sections
- Breadcrumb navigation
- Smooth scrolling
- Back-to-top button

### Developer Features
- WordPress best practices
- Theme hooks and filters
- Organized file structure
- Security enhancements
- Translation ready (i18n)
- Custom pagination
- Comment system integration

## Requirements

- WordPress 5.0 or higher
- PHP 7.4 or higher
- Advanced Custom Fields (ACF) plugin (Free or Pro version)

## Installation

### 1. Install the Theme

#### Method A: Upload via WordPress Admin
1. Download the theme files
2. Go to WordPress Admin → Appearance → Themes
3. Click "Add New" → "Upload Theme"
4. Choose the `newshub-theme.zip` file
5. Click "Install Now"
6. Activate the theme

#### Method B: Manual Installation
1. Download the theme files
2. Upload the `newshub-theme` folder to `/wp-content/themes/`
3. Go to WordPress Admin → Appearance → Themes
4. Find "NewsHub" and click "Activate"

### 2. Install Required Plugin

Install and activate **Advanced Custom Fields** (ACF):
1. Go to Plugins → Add New
2. Search for "Advanced Custom Fields"
3. Install and activate the plugin

The theme includes pre-configured ACF field groups that will automatically load.

### 3. Configure Theme Settings

#### Set Up Menus
1. Go to Appearance → Menus
2. Create a new menu and assign it to "Primary Menu"
3. (Optional) Create a footer menu and assign it to "Footer Menu"

#### Configure Widgets
1. Go to Appearance → Widgets
2. Add widgets to:
   - Main Sidebar (appears on blog posts)
   - Footer Widget 1, 2, 3 (appears in footer)

#### Upload Logo (Optional)
1. Go to Appearance → Customize → Site Identity
2. Upload your logo under "Logo"

### 4. Create Your First Pages

#### Create a Contact Page
1. Go to Pages → Add New
2. Title: "Contact"
3. Select Template: "Contact Page" from the Page Attributes
4. Publish the page

#### Set Up Homepage
1. Go to Settings → Reading
2. Choose "A static page" for homepage display
3. Select your desired homepage

## Custom Post Types

### Featured Articles
Access via Admin → Featured Articles

**Purpose**: Highlight important stories with special badges and priority levels

**Custom Fields (ACF)**:
- Featured Badge Text (default: "FEATURED")
- Priority (1-10 scale)
- Reading Time (in minutes)

**Usage**:
1. Create a new Featured Article
2. Fill in the custom fields
3. Featured articles display with special styling

### Author Profiles
Access via Admin → Author Profiles

**Purpose**: Create detailed author bios with social media links

**Custom Fields (ACF)**:
- Position/Title
- Biography (Rich text editor)
- Twitter Handle
- LinkedIn URL
- Email Address

**Usage**:
1. Create an Author Profile for each writer
2. Add featured image (author photo)
3. Fill in social media links

## Advanced Custom Fields (ACF)

### Hero Section Fields
Available on pages (in the page editor):

- **Hero Title**: Main headline for hero section
- **Hero Description**: Subtitle text
- **Show Hero Section**: Toggle to show/hide hero

### Theme Settings
Access via Admin → Theme Settings (ACF Options Page)

Configure global theme settings here.

## Customization

### Colors
Edit colors in `style.css` by modifying CSS custom properties:

```css
:root {
    --primary-color: #2563eb;      /* Main brand color */
    --secondary-color: #1e40af;     /* Secondary brand color */
    --accent-color: #ef4444;        /* Accent/alert color */
    /* Add more customizations here */
}
```

### Fonts
Change fonts by modifying these variables in `style.css`:

```css
:root {
    --font-primary: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
    --font-heading: Georgia, 'Times New Roman', serif;
}
```

### Layout
Adjust container width and spacing:

```css
:root {
    --container-width: 1200px;
    --spacing-xl: 3rem;
    /* Modify as needed */
}
```

## Theme File Structure

```
newshub-theme/
├── style.css                          # Main stylesheet with theme info
├── functions.php                      # Theme functions and hooks
├── header.php                         # Site header
├── footer.php                         # Site footer
├── index.php                          # Main blog template
├── single.php                         # Single post template
├── page.php                           # Page template
├── sidebar.php                        # Sidebar template
├── archive.php                        # Archive template
├── search.php                         # Search results template
├── 404.php                            # 404 error page
├── comments.php                       # Comments template
├── searchform.php                     # Search form
├── template-contact.php               # Contact page template
├── single-featured_article.php        # Featured article single
├── archive-featured_article.php       # Featured articles archive
├── single-author_profile.php          # Author profile single
├── archive-author_profile.php         # Author profiles archive
├── js/
│   └── main.js                        # JavaScript functionality
└── template-parts/
    └── content-card.php               # Post card component
```

## Features Guide

### Mobile Menu
- Automatically appears on screens smaller than 768px
- Tap the hamburger icon to toggle
- Tap outside to close

### Contact Form
- Uses WordPress native email system
- Includes spam protection with nonces
- Form validation (client and server-side)
- Success/error messages
- Email sent to admin email address

### Back to Top Button
- Appears when scrolling down 300px
- Smooth scroll animation
- Fixed position in bottom-right corner

### Related Posts
- Automatically displays 3 related posts
- Based on shared categories
- Appears on single post pages

### Pagination
- Custom styled pagination
- Works on archives, categories, tags, etc.
- SEO-friendly URLs

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)
- Mobile browsers (iOS Safari, Chrome Mobile)

## Performance

- Minimal external dependencies
- Optimized CSS with custom properties
- Lazy loading ready
- Clean, efficient JavaScript
- WordPress performance best practices

## Security Features

- Nonce verification for forms
- Input sanitization
- Output escaping
- Removed WordPress version info
- Secure file structure

## Support & Documentation

### Common Issues

**ACF Fields Not Showing**
- Make sure ACF plugin is installed and activated
- Fields are registered programmatically in `functions.php`

**Contact Form Not Sending**
- Check WordPress email settings
- Ensure admin email is configured correctly
- Test with SMTP plugin if needed

**Menu Not Appearing**
- Create a menu in Appearance → Menus
- Assign it to "Primary Menu" location

## Development

### Child Theme
To create a child theme:

1. Create a new folder: `newshub-child`
2. Create `style.css`:

```css
/*
Theme Name: NewsHub Child
Template: newshub-theme
*/
```

3. Create `functions.php`:

```php
<?php
add_action('wp_enqueue_scripts', 'newshub_child_enqueue_styles');
function newshub_child_enqueue_styles() {
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
}
```

### Customization Tips
- Use a child theme for major customizations
- Add custom CSS in Appearance → Customize → Additional CSS
- Hook into theme functions for extending functionality
- Follow WordPress coding standards

## Credits

- Built with WordPress best practices
- Icons: SVG icons
- Design: Custom responsive design
- ACF integration for dynamic content

## License

This theme is licensed under the GNU General Public License v2 or later.

## Changelog

### Version 1.0.0
- Initial release
- Core theme functionality
- Custom post types (Featured Articles, Author Profiles)
- ACF field groups
- Responsive design
- Contact form
- Mobile menu
- JavaScript enhancements

## Author

Your Name
- Website: https://example.com
- Email: [email protected]

---

**Need help?** Check the WordPress Codex or ACF documentation for additional guidance.

# NewsHub Theme - Quick Installation Guide

## Prerequisites

Before installing the NewsHub theme, ensure you have:

- ✅ WordPress 5.0 or higher installed
- ✅ PHP 7.4 or higher
- ✅ MySQL 5.6 or higher
- ✅ A WordPress admin account

## Step-by-Step Installation

### Step 1: Install the Theme

**Option A: Via WordPress Dashboard (Recommended)**

1. Log in to your WordPress admin panel
2. Navigate to **Appearance → Themes**
3. Click the **Add New** button
4. Click **Upload Theme**
5. Click **Choose File** and select the theme ZIP file
6. Click **Install Now**
7. Once installed, click **Activate**

**Option B: Via FTP/File Manager**

1. Extract the theme ZIP file on your computer
2. Connect to your server via FTP (FileZilla, Cyberduck, etc.)
3. Navigate to `/wp-content/themes/`
4. Upload the `newshub-theme` folder
5. Go to **Appearance → Themes** in WordPress admin
6. Find **NewsHub** and click **Activate**

### Step 2: Install Required Plugin

The theme requires **Advanced Custom Fields (ACF)** plugin:

1. Go to **Plugins → Add New**
2. Search for "Advanced Custom Fields"
3. Click **Install Now** on "Advanced Custom Fields" by WP Engine
4. Click **Activate** once installed

> **Note**: The free version of ACF is sufficient. The theme includes pre-configured field groups.

### Step 3: Initial Configuration

#### A. Set Up Navigation Menus

1. Go to **Appearance → Menus**
2. Click **Create a new menu**
3. Name it (e.g., "Main Menu")
4. Check the box for **Primary Menu** under "Display location"
5. Click **Create Menu**
6. Add pages to your menu using the left sidebar
7. Click **Save Menu**

#### B. Configure Widgets

1. Go to **Appearance → Widgets**
2. Drag widgets to:
   - **Main Sidebar**: For blog sidebar content
   - **Footer Widget 1, 2, 3**: For footer columns

**Recommended Sidebar Widgets**:
- Search
- Recent Posts
- Categories
- Tag Cloud

**Recommended Footer Widgets**:
- Text widget with about info
- Recent Posts
- Custom Menu

#### C. Upload Your Logo (Optional)

1. Go to **Appearance → Customize**
2. Click **Site Identity**
3. Click **Select Logo**
4. Upload your logo image (recommended: 400x100px)
5. Click **Publish**

### Step 4: Create Essential Pages

#### Create Homepage

1. Go to **Pages → Add New**
2. Title: "Home" or "Welcome"
3. Add your content
4. Publish the page

#### Create Contact Page

1. Go to **Pages → Add New**
2. Title: "Contact"
3. In **Page Attributes** → **Template**, select **Contact Page**
4. Add any additional content above the form
5. Publish the page

#### Create About Page

1. Go to **Pages → Add New**
2. Title: "About"
3. Add your about content
4. Publish the page

### Step 5: Set Static Homepage

1. Go to **Settings → Reading**
2. Select **A static page**
3. Choose your homepage from the dropdown
4. (Optional) Choose a "Posts page" for your blog
5. Click **Save Changes**

### Step 6: Create Your First Post

1. Go to **Posts → Add New**
2. Add a title and content
3. Set a **Featured Image** (right sidebar)
4. Add **Categories** and **Tags**
5. Click **Publish**

### Step 7: Test Custom Post Types

#### Create a Featured Article

1. Go to **Featured Articles → Add New**
2. Add title and content
3. Set a featured image
4. Scroll down to **Featured Article Settings**:
   - Set Featured Badge Text
   - Set Priority (1-10)
   - Set Reading Time
5. Publish

#### Create an Author Profile

1. Go to **Author Profiles → Add New**
2. Add author name as title
3. Set featured image (author photo)
4. Fill in **Author Profile Details**:
   - Position
   - Biography
   - Social media links
5. Publish

### Step 8: Customize Theme Settings

1. Go to **Theme Settings** (in admin sidebar)
2. Configure global theme options
3. Save changes

## Post-Installation Checklist

- [ ] Theme activated successfully
- [ ] ACF plugin installed and activated
- [ ] Primary menu created and assigned
- [ ] Logo uploaded (if applicable)
- [ ] Homepage created and set as static page
- [ ] Contact page created with contact template
- [ ] At least one blog post published
- [ ] Widgets configured
- [ ] Test contact form submission
- [ ] Check mobile responsiveness
- [ ] Test all navigation links

## Verification Steps

### 1. Check Homepage
Visit your site's homepage and verify:
- Header displays correctly
- Logo/site title visible
- Navigation menu works
- Hero section appears (if enabled)

### 2. Test Blog
Visit your blog page and check:
- Posts display in grid layout
- Featured images show
- Post metadata appears
- "Read More" links work

### 3. Test Single Post
Click on a post and verify:
- Title and content display
- Featured image shows
- Author and date appear
- Related posts show at bottom
- Comments form works (if enabled)

### 4. Test Contact Form
Visit the contact page and:
- Fill out the form
- Submit it
- Check for success message
- Verify email receipt

### 5. Test Mobile View
- Resize browser or use mobile device
- Check hamburger menu appears
- Test menu toggle
- Verify responsive layout

## Common Setup Issues

### ACF Fields Not Showing
**Solution**: Ensure ACF plugin is activated. Fields are registered programmatically and will appear automatically.

### Menu Not Appearing
**Solution**: Create a menu and assign it to "Primary Menu" location in Appearance → Menus.

### Contact Form Not Sending
**Solution**:
- Check Settings → General → Email Address is correct
- Install WP Mail SMTP plugin for reliable email delivery
- Contact your hosting provider about email configuration

### Styling Issues
**Solution**:
- Clear browser cache (Ctrl+F5 or Cmd+Shift+R)
- Clear WordPress cache if using a caching plugin
- Disable other plugins temporarily to check for conflicts

### Images Not Displaying
**Solution**: Go to Settings → Media and regenerate thumbnails using a plugin like "Regenerate Thumbnails"

## Next Steps

1. **Add Content**: Create more posts, pages, and custom content
2. **Customize Colors**: Edit CSS variables in Appearance → Customize → Additional CSS
3. **Add Plugins**: Consider SEO plugins (Yoast), performance (WP Super Cache), etc.
4. **Set Permalinks**: Go to Settings → Permalinks and choose "Post name"
5. **Create Sitemap**: Use Yoast SEO or similar for XML sitemap
6. **Analytics**: Add Google Analytics tracking code
7. **Backup**: Set up regular backups (UpdraftPlus, BackupBuddy, etc.)

## Support Resources

- **WordPress Codex**: https://codex.wordpress.org/
- **ACF Documentation**: https://www.advancedcustomfields.com/resources/
- **Theme Files**: Check README.md for detailed documentation

## Quick Reference

### Theme Locations
- **Theme Files**: `/wp-content/themes/newshub-theme/`
- **Uploads**: `/wp-content/uploads/`
- **Plugins**: `/wp-content/plugins/`

### Important Pages
- **Dashboard**: `/wp-admin/`
- **Customize**: `/wp-admin/customize.php`
- **Menus**: `/wp-admin/nav-menus.php`
- **Widgets**: `/wp-admin/widgets.php`

### File Permissions (if needed)
- Folders: 755
- Files: 644
- wp-config.php: 400 or 440

---

**Installation Complete!** 🎉

Your NewsHub theme is now ready to use. Start creating amazing content!

For detailed customization options, refer to the main README.md file.

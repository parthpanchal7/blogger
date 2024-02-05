<?php
// Add theme support
add_theme_support('post-thumbnails');
add_theme_support('custom-logo');
function theme_name_register_menus()
{
    register_nav_menus(
        array(
            'primary' => esc_html__('Primary Menu', 'theme_name'),
            'footer' => esc_html__('Footer Menu', 'theme_name'),
        ));
}
add_action('after_setup_theme', 'theme_name_register_menus');

if (!function_exists('add_script_style')) {
    function add_script_style()
    {
        /* Register & Enqueue Styles. */

        wp_register_style('main-style', get_template_directory_uri() . '/assets/css/main.css');
        wp_enqueue_style('main-style');

        /* Register & Enqueue scripts. */

        wp_register_script('jquery-script', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js');
        wp_enqueue_script('jquery-script');

        wp_register_script('main-script', get_template_directory_uri() . '/assets/js/main.js');
        wp_enqueue_script('main-script');
    }
}
add_action('wp_enqueue_scripts', 'add_script_style', 10);

// Enqueue Select2 script and styles
function enqueue_select2()
{
    if ((isset($_GET['page']) && ($_GET['page'] === 'custom_theme_options' || $_GET['page'] === 'custom_theme_tag_options'))) {
        wp_enqueue_script('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js', array('jquery'), '4.0.13', true);
        wp_enqueue_style('select2', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css', array(), '4.0.13');
    }
}
add_action('admin_enqueue_scripts', 'enqueue_select2');

// Add submenu page under Appearance menu
function custom_theme_add_options_page()
{
    add_menu_page(
        'Theme Options',
        'Theme Options',
        'manage_options',
        'custom_theme_options',
        'custom_theme_render_options_page'
    );
}
add_action('admin_menu', 'custom_theme_add_options_page');

function custom_theme_tag_options_page()
{
    add_submenu_page(
        'custom_theme_options',
        'Tag Options',
        'Tag Options',
        'manage_options',
        'custom_theme_tag_options',
        'custom_theme_render_tag_options_page'
    );
}
add_action('admin_menu', 'custom_theme_tag_options_page');

// Callback function to render the options page
function custom_theme_render_options_page()
{
    ?>
    <div class="wrap">
        <h2>Theme Options</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_theme_options');
            do_settings_sections('custom_theme_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Register settings and fields with category order
function custom_theme_register_settings()
{
    register_setting('custom_theme_options', 'selected_categories');
    register_setting('custom_theme_options', 'category_order');
    register_setting('custom_theme_options', 'display_write_us_button'); // New option for displaying custom button

    add_settings_section(
        'category_selection_section',
        'Category Selection',
        'custom_theme_category_selection_section_callback',
        'custom_theme_options'
    );

    add_settings_field(
        'selected_categories',
        'Select Categories for Menu',
        'custom_theme_selected_categories_callback',
        'custom_theme_options',
        'category_selection_section'
    );

    add_settings_section(
        'custom_button_section',
        'Write for us Button',
        'custom_button_section_callback',
        'custom_theme_options'
    );

    add_settings_field(
        'display_write_us_button',
        'Display Write for us Button in Header',
        'display_write_us_button_callback',
        'custom_theme_options',
        'custom_button_section'
    );
}
add_action('admin_init', 'custom_theme_register_settings');

// Section callback function
function custom_theme_category_selection_section_callback()
{
    echo '<p>Select the categories you want to display in the menu.</p>';
}

// Field callback function with Select2 multi-select and search
function custom_theme_selected_categories_callback()
{
    $selected_category_ids = get_option('selected_categories', array());
    $categories = get_categories(array('hide_empty' => 0)); // Include empty categories

    if (!empty($categories)) {
        echo '<select name="selected_categories[]" multiple="multiple" style="width: 100%;" class="custom-select2">';

        foreach ($categories as $category) {
            $selected = in_array($category->term_id, $selected_category_ids) ? 'selected="selected"' : '';
            echo '<option value="' . esc_attr($category->term_id) . '" ' . $selected . '>' . esc_html($category->name) . '</option>';
        }

        echo '</select>';
    } else {
        echo '<p>No categories found.</p>';
    }
}

// Display Custom Button section callback
function custom_button_section_callback()
{
    echo '<p>Toggle the display of the write for us button in the header.</p>';
}

// Field callback function for the toggle option
function display_write_us_button_callback()
{
    $display_write_us_button = get_option('display_write_us_button', '1');
    ?>
    <label for="display_write_us_button">
        <input type="checkbox" id="display_write_us_button" name="display_write_us_button" value="1" <?php checked($display_write_us_button, '1'); ?> />
        Display Write for us button
    </label>
    <?php
}

// Initialize Select2 script with custom sorting
function initialize_select2()
{
    if ((isset($_GET['page']) && ($_GET['page'] === 'custom_theme_options' || $_GET['page'] === 'custom_theme_tag_options'))) {
        ?>
        <script>
            jQuery(document).ready(function ($) {
                var $select = $('.custom-select2');

                $select.select2();

                $("select").on("select2:select", function (evt) {
                    var element = evt.params.data.element;
                    var $element = $(element);

                    $element.detach();
                    $(this).append($element);
                    $(this).trigger("change");
                });

                // Save the initial order of options
                var initialOrder = $select.find('option').map(function () {
                    return $(this).val();
                }).get();

                $select.on('select2:select', function (e) {
                    // Manually reorder selected options based on the initial order
                    var selectedOptions = $select.val();
                    var reorderedOptions = initialOrder.filter(function (option) {
                        return selectedOptions.includes(option);
                    });

                    $select.val(reorderedOptions).trigger('change');
                });

                $('.custom-select2-tags').select2({
                    placeholder: 'Select tags',
                    allowClear: true
                });
            });
        </script>
        <?php
    }
}
add_action('admin_footer', 'initialize_select2');

// Output Selected Categories and Custom Button in header.php without sorting
function output_selected_categories_and_custom_button()
{
    $selected_category_ids = get_option('selected_categories', array());
    $categories = get_categories();

    if (!empty($selected_category_ids)) {
        echo '<nav id="custom-menu">';
        echo '<ul>';
        foreach ($selected_category_ids as $category_id) {
            $category = get_category($category_id);

            // Check if the category still exists
            if ($category) {
                $class = is_category($category_id) ? 'menu_link current' : 'menu_link'; // Add 'current-category' class if it's the active category
                echo '<li class="' . esc_attr($class) . '"><a href="' . esc_url(get_category_link($category->term_id)) . '">' . esc_html($category->name) . '</a></li>';
            }
        }
        echo '</ul>';
        echo '</nav>';
    }
}
// Function to count post views
function count_post_views()
{
    if (is_single()) {
        $post_id = get_the_ID();
        $views = get_post_meta($post_id, 'post_views', true);
        $views = ($views == '') ? 1 : $views + 1;
        update_post_meta($post_id, 'post_views', $views);
    }
}
add_action('wp_head', 'count_post_views');
// Function to display post views
function display_post_views()
{
    $post_id = get_the_ID();
    $views = get_post_meta($post_id, 'post_views', true);
    echo $views;
}

function custom_theme_render_tag_options_page()
{
    ?>
    <div class="wrap">
        <h2>Tag Options</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_theme_tag_options');
            do_settings_sections('custom_theme_tag_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}
function custom_theme_register_tag_settings()
{
    register_setting('custom_theme_tag_options', 'selected_tags');

    add_settings_section(
        'tag_selection_section',
        'Tag Selection',
        'custom_theme_tag_selection_section_callback',
        'custom_theme_tag_options'
    );

    add_settings_field(
        'selected_tags',
        'Select Tags',
        'custom_theme_selected_tags_callback',
        'custom_theme_tag_options',
        'tag_selection_section'
    );
}
add_action('admin_init', 'custom_theme_register_tag_settings');

function custom_theme_tag_selection_section_callback()
{
    echo '<p>Select the tags you want to display.</p>';
}

function custom_theme_selected_tags_callback()
{
    $selected_tags = get_option('selected_tags', array());
    $tags = get_tags(array('hide_empty' => false));

    if (!empty($tags)) {
        echo '<select name="selected_tags[]" multiple="multiple" style="width: 100%;" class="custom-select2-tags">';
        foreach ($tags as $tag) {
            $selected = in_array($tag->term_id, $selected_tags) ? 'selected="selected"' : '';
            echo '<option value="' . esc_attr($tag->term_id) . '" ' . $selected . '>' . esc_html($tag->name) . '</option>';
        }
        echo '</select>';
    } else {
        echo '<p>No tags found.</p>';
    }
}

// Add submenu page for Site Description
function custom_theme_site_description_page()
{
    add_submenu_page(
        'custom_theme_options', // Parent menu slug (Theme Options)
        'Site Description', // Page title
        'Site Description', // Menu title
        'manage_options', // Capability
        'custom_theme_site_description', // Menu slug
        'custom_theme_render_site_description_page' // Callback function
    );
}
add_action('admin_menu', 'custom_theme_site_description_page');
// Callback function to render the Site Description page
function custom_theme_render_site_description_page()
{
    // Check if the form is submitted
    if (isset($_POST['site_description'])) {
        // Save the description
        update_option('site_description', $_POST['site_description']);
        echo '<div class="updated"><p>Site description saved!</p></div>';
    }

    // Get the current site description
    $site_description = get_option('site_description', '');

    // Render the form
    ?>
    <div class="wrap">
        <h2>Site Description</h2>
        <form method="post" action="">
            <label for="site_description">Enter Site Description:</label><br>
            <?php
            $settings = array(
                'textarea_name' => 'site_description', // Name of the textarea
                'textarea_rows' => 10, // Number of rows
                'teeny' => false, // Whether to output the minimal editor configuration
                'quicktags' => true, // Whether to enable quicktags (HTML tags)
                'media_buttons' => true, // Whether to display media upload buttons
                'tinymce' => true, // Whether to use TinyMCE editor
            );
            wp_editor($site_description, 'site_description', $settings);
            ?>
            <br><br>
            <input type="submit" name="submit" id="submit" class="button button-primary" value="Save Description">
        </form>
    </div>

    <?php
}

// Display the site description in the footer
function site_description()
{
    $site_description = get_option('site_description', '');
    if (!empty($site_description)) {
        echo $site_description;
    }
}
// Add submenu page for social media links under theme options
function custom_theme_social_media_options_page()
{
    add_submenu_page(
        'custom_theme_options', // Parent menu slug
        'Social Media Links',   // Page title
        'Social Media Links',   // Menu title
        'manage_options',       // Capability
        'custom_theme_social_media_options', // Menu slug
        'custom_theme_render_social_media_options_page' // Callback function
    );
}
add_action('admin_menu', 'custom_theme_social_media_options_page');

// Callback function to render the social media options page
function custom_theme_render_social_media_options_page()
{
    ?>
    <div class="wrap">
        <h2>Social Media Links</h2>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_theme_social_media_options');
            do_settings_sections('custom_theme_social_media_options');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}


// Register settings and fields for social media options
function custom_theme_register_social_media_settings()
{
    register_setting('custom_theme_social_media_options', 'social_media_links', 'custom_theme_sanitize_social_media_links');

    add_settings_section(
        'social_media_links_section',
        'Social Media Links',
        'custom_theme_social_media_links_section_callback',
        'custom_theme_social_media_options'
    );

    add_settings_field(
        'social_media_links',
        'Social Media Links',
        'custom_theme_social_media_links_callback',
        'custom_theme_social_media_options',
        'social_media_links_section'
    );
}
add_action('admin_init', 'custom_theme_register_social_media_settings');

// Section callback function for social media links section
function custom_theme_social_media_links_section_callback()
{
    echo '<p>Enter your social media links below.</p>';
}

// Field callback function for social media links
function custom_theme_social_media_links_callback()
{
    $social_media_links = get_option('social_media_links', array());
    $social_media_platforms = array(
        'facebook' => 'Facebook',
        'twitter' => 'Twitter (X)',
        'pinterest' => 'Pinterest',
        'instagram' => 'Instagram',
        'youtube' => 'Youtube',
        'linkedin' => 'Linkedin',
        // Add more social media platforms here
    );

    foreach ($social_media_platforms as $platform_key => $platform_name) {
        $link = isset($social_media_links[$platform_key]) ? esc_url($social_media_links[$platform_key]) : '';
        echo '<label for="' . esc_attr($platform_key) . '_link">' . esc_html($platform_name) . ' Link:</label><br>';
        echo '<input type="text" id="' . esc_attr($platform_key) . '_link" name="social_media_links[' . esc_attr($platform_key) . ']" value="' . $link . '" /><br><br>';
    }
}

// Sanitize social media links
function custom_theme_sanitize_social_media_links($input)
{
    $sanitized_input = array();
    if (is_array($input)) {
        foreach ($input as $key => $value) {
            $sanitized_input[$key] = esc_url_raw($value);
        }
    }
    return $sanitized_input;
}

// Function to display social media links in the footer
function display_social_media_links_in_footer()
{
    // Retrieve the social media links from options
    $social_media_links = get_option('social_media_links', array());

    // Initialize an empty array to store social media platforms
    $social_media_platforms = array();

    // Loop through the provided social media links to extract platform names
    foreach ($social_media_links as $platform_key => $link) {
        // Extract platform name from the key (e.g., 'facebook_link' becomes 'facebook')
        $platform_name = str_replace('_link', '', $platform_key);
        // Add the platform name to the array if the link is not empty
        if (!empty($link)) {
            $social_media_platforms[$platform_name] = $platform_name;
        }
    }

    // Output social media links
    echo '<div class="footer_social_media">';
    echo '<h3 class="footer_col_title">Social Media</h3>';
    echo '<ul class="social_media_links">';
    foreach ($social_media_links as $platform_key => $link) {
        // Check if the link is not empty and the platform exists in our defined list
        if (!empty($link) && isset($social_media_platforms[$platform_key])) {
            // Use the platform name as the class and the link as the URL
            ?>
            <li><a href="<?php echo esc_url($link); ?>">
                    <?php if ($platform_key === 'linkedin') {
                        ?> <i class="fa-brands fa-linkedin"></i>
                    <?php } else { ?>
                        <i class="fa-brands fa-square-<?php echo esc_attr($platform_key) ?>"></i>
            <?php } ?></a></li>
        <?php }
    }
    echo '</ul>';
    echo '</div>';
}

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_tax()) { //for custom post types
        $title = sprintf(__('%1$s'), single_term_title('', false));
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    }
    return $title;
});
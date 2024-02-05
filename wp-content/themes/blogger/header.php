<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/assets/css/all.min.css" />
    <script src="https://kit.fontawesome.com/d1c07d1753.js" crossorigin="anonymous"></script>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <div class="header_wrap">
            <div class="container_fluid">
                <div class="row mobile_between">
                    <?php
                    $custom_logo_id = get_theme_mod('custom_logo');
                    $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

                    if ($logo_url) {
                        ?>
                        <div class="logo_col">
                            <div class="site_logo">
                                <?php echo '<a href="' . esc_url(home_url('/')) . '"><img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '"></a>'; ?>
                            </div>
                        </div>
                    <?php } else { ?>
                        <h1 id="site_title"><a href="' . esc_url(home_url('/')) . '">
                                <?php esc_html(get_bloginfo('name')) ?>
                            </a></h1>
                        <p id="site_tagline">
                            <?php esc_html(get_bloginfo('description')) ?>
                        </p>
                        <h1 class="site_title"><a href="' . esc_url(home_url('/')) . '">
                                <?php esc_html(get_bloginfo('name')) ?>
                            </a></h1>
                        </h1>
                    <?php }
                    ?>
                    <div class="mobile_menu">
                        <div class="btn_search">
                            <div class="mobile_search">
                                <a href="<?php echo site_url()?>/search"><i class="fa-solid fa-magnifying-glass"></i></a>
                            </div>
                        </div>
                        <div class="navbar_toggler">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <div class="main_menu">
                        <div class="main_menu_wrap">
                            <?php
                            output_selected_categories_and_custom_button();

                            $display_write_us_button = get_option('display_write_us_button', '1');
                            if ($display_write_us_button === '1') { ?>
                                <div class="write_for_us_button">
                                    <a href="#" class="header_button"><i class="fa-regular fa-pen-field"
                                            aria-hidden="true"></i></a>
                                </div>
                            <?php }
                            ?>
                        </div>
                    </div>
                    <div class="search_box_col">
                        <div class="search_box">
                            <form role="search" method="get" class="search-form"
                                action="<?php echo esc_url(home_url('/')); ?>">
                                <div class="search_form">
                                    <input type="search" class="search-field"
                                        placeholder="<?php echo esc_attr_x('Search...', 'placeholder', 'your-theme-textdomain'); ?>"
                                        value="<?php echo get_search_query(); ?>" name="s" />
                                    <button type="submit" class="search-submit">
                                        <span class="screen-reader-text">
                                            <?php _e('Search', 'your-theme-textdomain'); ?>
                                        </span>
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>
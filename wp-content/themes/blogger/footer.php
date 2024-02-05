<footer id="footer">
    <div class="footer_inner">
    <div class="container_fluid">
        <div class="row">
            <div class="footer_col_one">
                <?php
                $custom_logo_id = get_theme_mod('custom_logo');
                $logo_url = wp_get_attachment_image_url($custom_logo_id, 'full');

                if ($logo_url) {
                    echo '<div class="footer_logo">';
                    echo '<a href="' . esc_url(home_url('/')) . '">';
                    echo '<img src="' . esc_url($logo_url) . '" alt="' . esc_attr(get_bloginfo('name')) . '">';
                    echo '</a>';
                    echo '</div>';
                }
                ?>
                <div class="site_desc">
                    <?php site_description(); ?>
                </div>
            </div>
            <div class="footer_col_one">
                <h3 class="footer_col_title">Tags</h3>
                <?php
                $selected_tags = get_option('selected_tags', array());

                if (!empty($selected_tags)) { ?>
                    <div class="selected_tags">
                        <div class="list_tags">
                            <?php
                            foreach ($selected_tags as $tag_id) {
                                $tag = get_tag($tag_id);
                                if ($tag) {
                                    echo '<a href="' . get_tag_link($tag_id) . '">' . $tag->name . '</a>';
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="footer_col_one">
                <h3 class="footer_col_title">Sponsored Links</h3>
                <?php
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer_menu_list',
            'menu'           => 'Sponsored Links',
        ) );
        ?>
            </div>
            <div class="footer_col_one">
                <h3 class="footer_col_title">Website Status</h3>
                <div class="website_status_img">
                    <img src="<?php echo get_template_directory_uri();?>/assets/images/website-status-1.png" alt="website status">
                </div>
                <?php display_social_media_links_in_footer(); ?>
            </div>
        </div>
    </div>
    </div>
    <div class="lower_footer">
        <div class="container_fluid">
            <div class="row justify_between">
                <div class="col_half">
                <?php
        wp_nav_menu( array(
            'theme_location' => 'footer',
            'menu_class'     => 'footer_policy_links',
            'menu'           => 'Footer Links',
        ) );
        ?>
                </div>
                <div class="col_half">
                    <p class="copyright_text">Copyright &copy; <?php echo date('Y'); echo ", "; bloginfo('name'); ?></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>

</html>
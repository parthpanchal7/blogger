<?php get_header();
$author_name = get_the_author();
$author_url = get_author_posts_url(get_the_author_meta('ID'));
$categories = get_the_category();
if (!empty($categories)) {
    $first_category = $categories[0];
    $category_name = $first_category->name;
    $category_url = get_category_link($first_category->term_id);
}
?>

<main id="main-content">
    <?php if (have_posts()):
        while (have_posts()):
            the_post(); ?>
            <article <?php post_class(); ?>>
                <div class="article_banner">
                    <div class="container">
                        <div class="banner_content">
                            <h1>
                                <?php the_title(); ?>
                            </h1>
                            <div class="post_meta">
                                <ul>
                                    <li>
                                        <i class="fa-solid fa-user" aria-hidden="true"></i>
                                        <a href="<?php echo esc_url($author_url); ?>">
                                            <?php the_author(); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-light fa-tags" aria-hidden="true"></i>
                                        <a href="<?php echo esc_url($category_url); ?>">
                                            <?php echo $category_name; ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-calendar-days" aria-hidden="true"></i>
                                        <?php echo get_the_date('d M Y'); ?>
                                        </a>
                                    </li>
                                    <li>
                                        <i class="fa-regular fa-eye" aria-hidden="true"></i>
                                        <?php display_post_views(); ?>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="main_content_wrap">
                    <div class="container">
                        <div class="row">
                            <div class="all_blogs_col col-8 border_part">
                                <div class="featured_img">
                                    <?php
                                    if (has_post_thumbnail()) {
                                        $featured_image_url = get_the_post_thumbnail_url();
                                    }
                                    ?>
                                    <img src="<?php echo $featured_image_url; ?>" alt="<?php the_title();?>">
                                </div>
                                <?php the_content(); ?>
                                <div class="form_comment_form">
                                    <?php comment_form(); ?>
                                </div>
                            </div>
                            <div class="all_category_col col-4">
                                <div class="heading_all_blogs">
                                    <h3>category</h3>
                                </div>
                                <div class="sticky_category_block not_sticky">
                                    <div class="category_block_inner">
                                        <ul>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Accounting</span><span
                                                        class="cat_count">49</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">Advanced SEO</span><span
                                                        class="cat_count">13</span></a>
                                            </li>
                                            <li>
                                                <a href="#"><span class="cat_name">AI/ML</span><span
                                                        class="cat_count">2</span></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <?php $tags = get_tags(array('hide_empty' => false));
                                if ($tags) {
                                    ?>
                                    <div class="heading_all_blogs">
                                        <h3>Tags</h3>
                                    </div>
                                    <div class="all_tags_list">
                                        <p>
                                            <?php foreach ($tags as $tag) { ?>
                                                <a href="<?php echo get_tag_link($tag->term_id); ?>">
                                                    <?php echo $tag->name ?>
                                                </a>
                                            <?php } ?>
                                        </p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </article>
        <?php endwhile; endif; ?>
</main>
<?php get_footer(); ?>
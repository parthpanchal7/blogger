<?php get_header(); ?>

<main id="main-content">
    <h2><?php printf(__('Search Results for: %s', 'your-theme-text-domain'), get_search_query()); ?></h2>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <?php the_excerpt(); ?>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('No results found', 'your-theme-text-domain'); ?></p>
    <?php endif; ?>
</main>
<?php get_footer(); ?>

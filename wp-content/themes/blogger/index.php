<?php get_header(); ?>

<main id="main-content">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>
        </article>
    <?php endwhile; else : ?>
        <p><?php esc_html_e('No content found', 'your-theme-text-domain'); ?></p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>

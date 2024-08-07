<?php get_header(); ?>
<div class="theme-content">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>

        <h2>Modul părinte</h2>
        <?php
        $parent_module = get_field('parent_module');

        print_r($parent_module);

        if ($parent_module) : ?>
            <a href="<?php echo get_permalink($parent_module->ID); ?>"><?php echo get_the_title($parent_module->ID); ?></a>
        <?php endif; ?>
        <h2>Carte părinte</h2>
        <?php
        $parent_book = get_field('parent_book');
        if ($parent_book) : ?>
            <a href="<?php echo get_permalink($parent_book->ID); ?>"><?php echo get_the_title($parent_book->ID); ?></a>
        <?php endif; ?>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>

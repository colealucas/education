<?php get_header(); ?>
<div class="book-content">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
        <h2>Module</h2>
        <ul>
            <?php
            $modules = new WP_Query(array(
                'post_type' => 'module',
                'meta_query' => array(
                    array(
                        'key' => 'parent_book',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE'
                    ),
                ),
            ));
            while ($modules->have_posts()) : $modules->the_post();
                ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
    <?php endwhile; ?>
</div>
<?php get_footer(); ?>

<?php get_header(); ?>
<div class="module-content">
    <?php while (have_posts()) : the_post(); ?>
        <h1><?php the_title(); ?></h1>
        <div><?php the_content(); ?></div>
        <h2>Teme</h2>
        <ul>
            <?php
            $themes = new WP_Query(array(
                'post_type' => 'theme',
                'meta_query' => array(
                    array(
                        'key' => 'parent_module',
                        'value' => '"' . get_the_ID() . '"',
                        'compare' => 'LIKE'
                    ),
                ),
            ));
            while ($themes->have_posts()) : $themes->the_post();
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
